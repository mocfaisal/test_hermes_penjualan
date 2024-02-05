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

    // static function genSKU() {
    //     $tahun_now = date('Y');
    //     $first_kode = '';
    //     $field_kode = 'product_code';

    //     $data = self::selectRaw("IFNULL(MAX(SUBSTRING(" . $field_kode . ", 3, 7)), 0) +1 as no_urut")->whereRaw(
    //         'SUBSTRING($field_kode . ", 1, 2 )) = "' . $tahun_now . '"'
    //     )->first();


    //     // $query      = $this->db->query("SELECT IFNULL( MAX( SUBSTRING( " . $field_kode . ", 3, 7 )), 0 ) +1 AS no_urut FROM " . $table . " WHERE SUBSTRING( " . $field_kode . ", 1, 2 ) = '" . $tahun_now . "'");
    //     // $data       = $query->row_array();
    //     $no_urut    = sprintf("%'.05d", $data->no_urut);
    //     $result = $first_kode . $tahun_now . $no_urut;
    //     return $result;
    // }

    // static function gen_sku($text, $existingSKUs = []) {
    //     $maxLength = 18;

    //     // Generate base code from text
    //     $baseCode = strtoupper(substr(preg_replace('/\s+/', '', $text), 0, 7));

    //     // Ensure the base code is within the allowed length
    //     $baseCode = str_pad($baseCode, 7, 'X');
    //     $highestIncrement = 0;

    //     // Check if SKU already exists
    //     if (in_array($baseCode, $existingSKUs)) {
    //         // Find the highest increment value
    //         foreach ($existingSKUs as $existingSKU) {
    //             $pattern = '/^' . preg_quote($baseCode, '/') . '(\d+)$/';
    //             if (preg_match($pattern, $existingSKU, $matches)) {
    //                 $increment = intval($matches[1]);
    //                 $highestIncrement = max($highestIncrement, $increment);
    //             }
    //         }

    //         $highestIncrement++;
    //         // Increment the value
    //     } else {
    //         $highestIncrement = 1;
    //         // Pad with zeros if necessary
    //     }

    //     $baseCode .= str_pad($highestIncrement, 8, '0', STR_PAD_LEFT);


    //     // Ensure the final SKU is within the allowed length
    //     $finalSKU = 'SKU' . substr($baseCode, 0, $maxLength);

    //     return $finalSKU;
    // }

    static function gen_sku($text) {
        // Generate base code from text
        $baseCode = strtoupper(substr(preg_replace('/\s+/', '', $text), 0, 7));

        $data = self::selectRaw("IFNULL(MAX(SUBSTRING(product_code, 3, 7)), 0) +1 as no_urut")->whereRaw("SUBSTRING(product_code, 3, 7) = " . $baseCode)->orderBy('product_code', 'desc')->first();


        $baseCode .= str_pad($data->no_urut, 8, '0', STR_PAD_LEFT);

        // Ensure the final SKU is within the allowed length
        $finalSKU = 'SKU' . $baseCode;

        return $finalSKU;
    }
}
