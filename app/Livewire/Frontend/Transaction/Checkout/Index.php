<?php

namespace App\Livewire\Frontend\Transaction\Checkout;

use Livewire\Component;
use Livewire\Attributes\Computed;
use App\Models\Table\transaction as tr_transaction;
use App\Models\Table\transaction_detail as tr_transaction_detail;
use App\Models\Table\m_product;
use DB;

class Index extends Component {
    public $id_transaction = null;
    public $user_id = null;
    public $cart_data = [];

    public function render() {
        return view('livewire.frontend.transaction.checkout.index')->layout('components.layouts.frontend.portal.main');
    }

    function __construct() {
        $this->user_id = session()->get('user_id');
    }

    function mount() {
        $this->cart_data = $this->dataCart;
        $this->id_transaction = $this->cart_data->id ?? null;;
    }

    #[Computed]
    function dataCart() {
        return tr_transaction::where('id_user', $this->user_id)
            ->where('status', 'pending')->first();
    }

    #[Computed]
    function listCart() {
        return tr_transaction_detail::select('transaction_detail.*', DB::Raw('CASE WHEN m_product.product_name IS NULL then transaction_detail.product_name ELSE m_product.product_name END as product_name_final'))
            ->where('id_transaction', $this->id_transaction)
            ->leftJoin('m_product', 'transaction_detail.product_code', '=', 'm_product.product_code')
            ->get();
    }

    function processCheckout() {
        $this->skipRender();

        $save = tr_transaction::where('id', $this->id_transaction)->where('id_user', $this->user_id)
            ->update([
                'status' => 'complete',
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

        if ($save) {
            $r = [
                'success' => true,
                'msg' => 'Checkout Success',
            ];
        } else {
            $r = [
                'success' => false,
                'msg' => 'Checkout Failed',
            ];
        }

        $this->dispatch('showResult', result: $r);
    }
}
