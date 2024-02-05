<?php

namespace App\Livewire\Backend\Auth;

use Livewire\Component;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\IpUtils;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Http;
use Auth;
use Session;

class Login extends Component {
    public $email;
    public $password;

    public function render() {
        return view('livewire.backend.auth.login')->layout('components.layouts.frontend.auth.main');
    }

    protected function rules() {
        return [
            'email' => 'required',
            'password' => 'required',
        ];
    }

    function processLogin() {
        $this->skipRender();

        $email = $this->email;
        $password = $this->password;

        $this->validate();

        // $this->validate($request, [
        //     'email' => 'required',
        //     'password' => 'required',
        // ]);

        $is_auth = Auth::attempt(['email' => $email, 'password' => $password, 'type' => 1]);

        if ($is_auth) {
            $user_data = Auth::user();

            $user_id = $user_data->id;
            $user_name = $user_data->name;
            $user_type = $user_data->type;

            // Set Session
            Session::put('user_id', $user_id);
            Session::put('user_fullname', $user_name);
            Session::put('user_type', $user_type);

            // Redirect to route
            // return redirect()->route('backend.home');
            $r = ['success' => true, 'msg' => 'Berhasil Login', 'uri' => route('backend.home')];
        } else {
            $r = ['success' => false, 'msg' => 'Email atau Password salah'];
        }

        // dispatch to current js function
        $this->dispatch('showResult', result: $r);
    }

    function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('backend.auth.login');
    }
}
