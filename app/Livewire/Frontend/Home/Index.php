<?php

namespace App\Livewire\Frontend\Home;

use Livewire\Component;
use App\Models\Table\m_product;
use App\Models\Table\transaction as tr_transaction;
use App\Models\Table\transaction_detail as tr_transaction_detail;

class Index extends Component {
    public $list_product = [];

    public function render() {
        return view('livewire.frontend.home.index')->layout('components.layouts.frontend.portal.main');
    }

    function mount() {
        $this->list_product = m_product::orderBy('created_at', 'desc')->limit(10)->get();
    }

    function addCart($id_product, $qty = 1) {
        $this->skipRender();

        $result = tr_transaction::addCart($id_product, $qty);

        $this->dispatch('showResult', result: $result);
    }
}
