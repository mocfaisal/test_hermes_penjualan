<?php

namespace App\Livewire\Frontend\Product;

use Livewire\Component;
use App\Models\Table\m_product;
use App\Models\Table\transaction as tr_transaction;

class Detail extends Component {
    public $id_product = null;
    public $qty_product_cart = 1;
    public $data_product = [];

    public function render() {
        return view('livewire.frontend.product.detail')->layout('components.layouts.frontend.portal.main');
    }

    function mount($id_product) {
        $this->id_product = $id_product;
        $this->data_product = m_product::findOrFail($id_product);
    }

    function updateQty($qty) {
        $this->qty_product_cart = $qty;
    }

    function incrementQty() {
        $this->qty_product_cart++;
    }

    function decrementQty() {
        $this->qty_product_cart--;
    }

    function addCart($id_product) {
        $this->skipRender();

        $qty = $this->qty_product_cart;
        $result = tr_transaction::addCart($id_product, $qty);

        $this->dispatch('showResult', result: $result);
    }
}
