<?php

namespace App\Livewire\Backend\Master\Product;

use Livewire\Component;
use Session;
use Livewire\Attributes\Rule;
use Livewire\Attributes\On;
use App\Models\Table\m_product;

class Create extends Component {
    private $current_user_id;

    public $is_edit = false;

    public $id;

    public $input_code;
    public $input_currency = 'IDR';
    public $input_price;
    public $input_discount = 0;
    public $input_unit = 'PCS';
    public $input_dimension;

    #[Rule('required')]
    public $input_name;

    public function __construct() {
        $this->current_user_id = Session::get('user_id');
    }

    public function render() {
        return view('livewire.backend.master.product.create');
    }

    function mount() {
    }

    public function save() {
        // $this->skipRender();

        try {
            $this->validate();

            $current_user_id =  $this->current_user_id ?? Session::get('user_id');

            $input_name = $this->input_name;
            $input_code = $this->input_code;
            $input_currency = $this->input_currency;
            $input_price = $this->input_price;
            $input_discount = $this->input_discount;
            $input_unit = $this->input_unit;
            $input_dimension = $this->input_dimension;

            if (empty($input_code)) {
                $input_code = m_product::gen_sku($input_name);
            }

            $datasave = [
                'product_name' => $input_name,
                'product_code' => $input_code,
                'currency' => $input_currency,
                'price' => $input_price,
                'discount' => $input_discount,
                'unit' => $input_unit,
                'dimension' => $input_dimension,
            ];

            if ($this->is_edit) {
                // $datasave['updated_by'] = $current_user_id;
                $save = m_product::where('id', $this->id)
                    // ->where('created_by', $current_user_id)
                    ->update($datasave);
            } else {
                // $datasave['created_by'] = $current_user_id;
                $save = m_product::create($datasave);
            }

            if ($save) {
                $this->dispatch('refresh-data');
                $r = ['success' => true, 'msg' => 'Data berhasil disimpan!'];

                // Reset the form after saving
                $this->resetForm();
            } else {
                $r = ['success' => false, 'msg' => 'Data gagal disimpan!'];
            }

            return $this->dispatch('showResult', result: $r);
        } catch (\Throwable $th) {
            $r = ['success' => false, 'msg' => $th->getMessage()];
        }

        return $this->dispatch('showResult', result: $r);
    }

    #[On('edit-mode')]
    function edit($id) {
        $this->is_edit = true;
        $data = m_product::where('id', $id)
            // ->where('created_by', $this->current_user_id)
            ->first();

        $this->id = $id;

        $this->input_name = $data->product_name;
        $this->input_code = $data->product_code;
        $this->input_currency = $data->currency;
        $this->input_price = $data->price;
        $this->input_discount = $data->discount;
        $this->input_unit = $data->unit;
        $this->input_dimension = $data->dimension;
        return false;
    }

    #[On('reset-modal')]
    public function resetForm() {
        // $this->reset(['input_nama', 'is_attribute']);
        $this->reset();
    }
}
