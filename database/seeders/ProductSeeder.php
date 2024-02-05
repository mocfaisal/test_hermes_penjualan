<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        DB::table('m_product')->insert([
            [
                'product_code' => 'SKUSKILNP',
                'product_name' => 'So klin Pewangi',
                'price' => 15000,
                'currency' => 'IDR',
                'discount' => 10,
                'dimension' => '13 cm x 10 cm',
                'unit' => 'PCS',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'product_code' => 'SKUGIVBR1',
                'product_name' => 'GIV Biru',
                'price' => 11000,
                'currency' => 'IDR',
                'discount' => 0,
                'dimension' => '13 cm x 10 cm',
                'unit' => 'PCS',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'product_code' => 'SKUSKILNL',
                'product_name' => 'So Klin Liquid',
                'price' => 18000,
                'currency' => 'IDR',
                'discount' => 0,
                'dimension' => '13 cm x 10 cm',
                'unit' => 'PCS',
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
