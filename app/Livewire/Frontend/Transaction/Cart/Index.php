<?php

namespace App\Livewire\Frontend\Transaction\Cart;

use Livewire\Component;
use Livewire\Attributes\Computed;
use App\Models\Table\transaction as tr_transaction;
use App\Models\Table\transaction_detail as tr_transaction_detail;
use App\Models\Table\m_product;

class Index extends Component {
    public $id_transaction = null;
    public $user_id = null;
    public $cart_data = [];

    public function render() {
        return view('livewire.frontend.transaction.cart.index')->layout('components.layouts.frontend.portal.main');
    }

    function __construct() {
        $this->user_id = session()->get('user_id');
    }

    function mount() {
        $this->cart_data = $this->dataCart;
        $this->id_transaction = $this->cart_data->id ?? null;
    }

    function updateQty($id, $qty, $mode = null) {
        $curr_data = tr_transaction_detail::where('id', $id)->first();
        $final_qty = 1;

        if ($mode == '+') {
            $final_qty = intval($curr_data->quantity + $qty);
        } elseif ($mode == '-') {
            $final_qty = intval($curr_data->quantity - $qty);
        } else {
            $final_qty = $qty;
        }

        $subtotal = $final_qty * $curr_data->price;

        $curr_data->update([
            'quantity' => $final_qty,
            'subtotal' => $subtotal,
        ]);

        tr_transaction::updateTotal($this->id_transaction);
    }

    function removeProduct($id) {
        $id_transaction = $this->id_transaction;
        tr_transaction_detail::where('id_transaction', $id_transaction)->where('id', $id)->delete();
        tr_transaction::updateTotal($id_transaction);
        tr_transaction::getCountCart($this->user_id);
    }

    #[Computed]
    function dataCart() {
        return tr_transaction::where('id_user', $this->user_id)
            ->where('status', 'pending')->first();
    }

    #[Computed]
    function listCart() {
        return tr_transaction_detail::select('transaction_detail.*', 'm_product.product_name')
            ->where('id_transaction', $this->id_transaction)
            ->join('m_product', 'transaction_detail.product_code', '=', 'm_product.product_code')
            ->get();
    }
}
