<?php

namespace App\Models\Table;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Table\transaction_detail as tr_transaction_detail;
use App\Models\Table\m_product;

class transaction extends Model {
    use HasFactory;
    protected $table = "transaction";
    protected $id = "id";
    // protected $fillable = ['*'];
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public static function genDocNumber($prefix = 'TRX') {
        $last = self::where('document_code', $prefix)->orderBy('document_number', 'desc')->first();
        if ($last) {
            $last = intval($last->document_number) + 1;
        } else {
            $last = 1;
        }
        return str_pad($last, 10, '0', STR_PAD_LEFT);
    }

    static function updateTotal($id_transaction) {
        $total = tr_transaction_detail::where('id_transaction', $id_transaction)->sum('subtotal');
        $trx = self::findOrFail($id_transaction);
        $trx->total = $total;
        $trx->save();
    }

    static function getCountCart($id_user, $id_transaction = null) {
        $count = 0;
        if ($id_transaction) {
            $count = self::where([
                ['id_transaction', '=', $id_transaction],
                ['id_user', '=', $id_user],
                ['status', '=', 'pending'],
            ])
                ->join('transaction_detail', 'transaction.id', '=', 'transaction_detail.id_transaction')
                ->count();
        } else {
            $count = self::where([
                ['id_user', '=', $id_user],
                ['status', '=', 'pending'],
            ])
                ->join('transaction_detail', 'transaction.id', '=', 'transaction_detail.id_transaction')
                ->count();
        }

        session()->put('count_cart_item', $count);

        return $count;
    }

    static function addCart($product_id, $qty = 1) {
        $save = false;

        $id_transaction = null;
        $id_user = session()->get('user_id');
        $curr_user_name = session()->get('user_fullname');
        $qty = $qty;

        $product_data = m_product::findOrFail($product_id);
        $product_name = $product_data->product_name;
        $product_code = $product_data->product_code;
        $product_price = $product_data->price;
        $unit = $product_data->unit;
        $currency = $product_data->currency;

        $document_code = 'TRX';
        $document_number = 0;

        $data_detail = [
            // 'id_user' => $id_user,
            // 'document_code' => $document_code,
            // 'document_number' => $document_number,
            'product_id' => $product_id,
            'product_name' => $product_name,
            'product_code' => $product_code,
            'price' => $product_price,
            'quantity' => $qty,
            'unit' => $unit,
            'currency' => $currency,
        ];

        // checking if product already in cart

        $is_tr_exist = self::where([
            ['id_user', '=', $id_user],
            ['status', '=', "pending"],
        ])->first();

        if (!empty($is_tr_exist)) {
            // NOTE Data Transaction exist
            $data_cart = $is_tr_exist->toArray();
            $id_transaction = $data_cart['id'];

            $data_detail_curr = tr_transaction_detail::where([
                ['id_transaction', '=', $id_transaction],
                ['product_code', '=', $product_code]
            ]);

            $is_tr_detail_exist = $data_detail_curr->first();

            if ($is_tr_detail_exist) {
                // NOTE Data product exist in cart
                $data_detail['quantity'] = $is_tr_detail_exist->quantity + $qty;

                $sub_total = $product_price * $data_detail['quantity'];

                $data_detail['subtotal'] = $sub_total;
                $data_detail['updated_at'] = date('Y-m-d H:i:s');

                $save = $data_detail_curr->update($data_detail);
            } else {
                // NOTE Data product not exist in cart
                $sub_total = $product_price * $qty;
                $data_detail['subtotal'] = $sub_total;
                $data_detail['id_transaction'] = $id_transaction;

                $data_detail['document_code'] = $data_cart['document_code'];
                $data_detail['document_number'] = $data_cart['document_number'];
                $data_detail['created_at'] = date('Y-m-d H:i:s');

                $save = tr_transaction_detail::insert($data_detail);
            }
        } else {
            // NOTE Data Transaction not exist
            $document_number = self::genDocNumber($document_code);
            $sub_total = $product_price * $qty;

            $id_transaction = self::insertGetId(
                [
                    'document_code' => $document_code,
                    'document_number' => $document_number,
                    'id_user' => $id_user,
                    'user' => $curr_user_name,
                    'status' => 'pending',
                    'tgl_trx' => date('Y-m-d'),
                ]
            );

            // $id_transaction =  self::latest('id')->first()->id;
            // $id_transaction =  $save_parent->id;

            if ($id_transaction) {
                $data_detail['document_code'] = $document_code;
                $data_detail['document_number'] = $document_number;
                $data_detail['subtotal'] = $sub_total;
                $data_detail['id_transaction'] = $id_transaction;
                $data_detail['created_at'] = date('Y-m-d H:i:s');

                $save = tr_transaction_detail::insert($data_detail);
            }
        }

        if ($save) {

            self::updateTotal($id_transaction);
            self::getCountCart($id_user);

            $r = [
                'success' => true,
                'msg' => 'Product success added to cart',
            ];
        } else {
            $r = [
                'success' => false,
                'msg' => 'Product failed to add to cart',
            ];
        }

        return $r;
    }
}
