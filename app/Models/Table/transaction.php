<?php

namespace App\Models\Table;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Table\transaction_detail as tr_transaction_detail;

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
                ['id_user', '=', $id_user]
            ])
                ->join('transaction_detail', 'transaction.id', '=', 'transaction_detail.id_transaction')
                ->count();
        } else {
            $count = self::where('id_user', $id_user)
                ->join('transaction_detail', 'transaction.id', '=', 'transaction_detail.id_transaction')
                ->count();
        }

        session()->put('count_cart_item', $count);

        return $count;
    }
}
