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

        $save = false;

        $id_transaction = null;
        $id_user = session('user_id');
        $curr_user_name = session('user_fullname');
        $id_product = $id_product;
        $qty = $qty;

        $product_data = m_product::findOrFail($id_product);
        $product_code = $product_data->product_code;
        $product_price = $product_data->price;
        $unit = $product_data->unit;
        $currency = $product_data->currency;

        $document_code = 'TRX';
        $document_number = 0;

        $data_detail = [
            // 'id_user' => $id_user,
            // 'id_product' => $id_product,
            // 'document_code' => $document_code,
            // 'document_number' => $document_number,
            'product_code' => $product_code,
            'price' => $product_price,
            'quantity' => $qty,
            'unit' => $unit,
            'currency' => $currency,
        ];

        // checking if product already in cart

        $is_tr_exist = tr_transaction::where('id_user', $id_user)
            ->where('status', 'pending')
            ->first();

        if ($is_tr_exist) {
            $id_transaction = $is_tr_exist->id;

            $data_detail_curr = tr_transaction_detail::where([
                ['id_transaction', '=', $id_transaction],
                ['product_code', '=', $product_code]
            ]);

            $is_tr_detail_exist = $data_detail_curr->first();

            if ($is_tr_detail_exist) {
                // Data product exist in cart
                $data_detail['quantity'] = $is_tr_detail_exist->quantity + $qty;

                $sub_total = $product_price * $data_detail['quantity'];

                $data_detail['subtotal'] = $sub_total;

                $save = $data_detail_curr->update($data_detail);
            } else {
                // Data product not exist in cart
                $sub_total = $product_price * $qty;
                $data_detail['subtotal'] = $sub_total;
                $data_detail['id_transaction'] = $id_transaction;

                $data_detail['document_code'] = $is_tr_exist->document_code;
                $data_detail['document_number'] = $is_tr_exist->document_number;

                $save = tr_transaction_detail::insert($data_detail);
            }
        } else {
            $document_number = tr_transaction::genDocNumber($document_code);
            $sub_total = $product_price * $qty;

            tr_transaction::insert(
                [
                    'document_code' => $document_code,
                    'document_number' => $document_number,
                    'id_user' => $id_user,
                    'user' => $curr_user_name,
                    'status' => 'pending',
                    'tgl_trx' => date('Y-m-d H:i:s'),
                ]
            );

            $id_transaction =  tr_transaction::latest('id')->first()->id;

            $data_detail['subtotal'] = $sub_total;
            $data_detail['id_transaction'] = $id_transaction;

            $save = tr_transaction_detail::insert($data_detail);
        }

        if ($save) {

            tr_transaction::updateTotal($id_transaction);
            tr_transaction::getCountCart($id_user);

            $r = [
                'success' => true,
                'message' => 'Product success added to cart',
            ];
        } else {
            $r = [
                'success' => false,
                'message' => 'Product failed to add to cart',
            ];
        }

        $this->dispatch('showResult', $r);
    }
}
