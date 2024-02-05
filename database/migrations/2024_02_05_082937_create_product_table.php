<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('m_product', function (Blueprint $table) {
            $table->id();
            $table->string('product_name', 30);
            $table->string('product_code', 18)->unique();
            $table->double('price', 6, 2)->comment('Harga Jual Produk dalam satuan Currency');
            $table->string('currency', 5)->comment('Satuan Harga Jual');
            $table->double('discount', 6, 2)->comment('Diskon dalam persen');
            $table->string('dimension', 50)->comment('Dimensi Produk');
            $table->string('unit', 5)->comment('Satuan Jual Produk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('m_product');
    }
};
