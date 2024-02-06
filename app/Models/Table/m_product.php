<?php

namespace App\Models\Table;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_product extends Model {
    use HasFactory;
    protected $table = "m_product";
    protected $id = "id";
    // protected $fillable = ['*'];
    protected $guarded = ['id', 'created_at', 'updated_at'];

    static function gen_sku($text) {
        // Generate base code from text
        $baseCode = strtoupper(substr(preg_replace('/\s+/', '', $text), 0, 7));

        $data = self::selectRaw("MAX(SUBSTRING(product_code, 11, 8)) as no_urut")
            ->whereRaw("SUBSTRING(product_code, 4, 7) = '" . $baseCode . "'")
            ->orderBy('no_urut', 'desc')->first();

        $no_urut = ($data->no_urut ?? 0) + 1;

        $baseCode .= str_pad($no_urut, 8, '0', STR_PAD_LEFT);

        // Ensure the final SKU is within the allowed length
        $finalSKU = 'SKU' . $baseCode;

        return $finalSKU;
    }
}
