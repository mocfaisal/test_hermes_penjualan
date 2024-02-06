<?php

namespace App\Livewire\Backend\Master\Product;

use Livewire\Component;
use Illuminate\Http\Request;
use Session;
use DataTables;
use Livewire\Attributes\On;
use DB;
use App\Models\Table\m_product;
// use App\Models\Utils\Salz_utils;


class Index extends Component {
    public $current_user_id;

    public function __construct() {
        $this->current_user_id = session()->get('user_id');
    }

    public function render() {
        return view('livewire.backend.master.product.index')->layout('components.layouts.backend.admin.main');
    }

    public function getData(Request $request) {
        $this->skipRender();

        if ($request->ajax()) {
            $new_data = [];
            $curr_user_id = $this->current_user_id;
            $limit = $request->input('length');

            $data = m_product::limit($limit)->get()->toArray();

            if (!empty($data)) {
                foreach ($data as $key => $val) {
                    $new_data[] = $val;
                }
            }

            return DataTables::of($new_data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '';
                    $btn .= '<a href="javascript:void(0);" class="btn icon btn-primary" data-bs-tooltip="true" data-bs-title="Edit" data-bs-toggle="modal" data-bs-target="#mdl_product" wire:click="$dispatch(\'edit-mode\',{id: ' . $row['id'] . '})" ><i class="bi bi-pencil"></i></a>';
                    $btn .= ' | <a href="javascript:void(0);" onclick="popDelete(' . $row['id'] . ')" class="btn icon btn-danger" data-bs-title="Delete"><i class="bi bi-x"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->only(['id', 'product_name', 'product_code', 'price', 'currency', 'discount', 'dimension', 'unit', 'action'])
                ->make(true);
        } else {
            return false;
        }
    }

    public function destroy($id) {
        $this->skipRender();

        $delete = m_product::where('id', $id)->delete();

        if ($delete) {
            $r = ['success' => true, 'msg' => 'Data berhasil dihapus!'];
        } else {
            $r = ['success' => false, 'msg' => 'Data gagal dihapus!'];
        }

        $this->dispatch('showResult', result: $r);
    }
}
