<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaction_detail', function (Blueprint $table) {
            $table->id();
            $table->integer('id_transaction')->comment('ID Transaksi');
            $table->string('document_code', 3)->comment('Kode Dokumen');
            $table->string('document_number', 10)->comment('Nomor Dokumen');
            $table->string('product_code', 18)->comment('Kode Produk');
            $table->double('price', 6, 2)->comment('Harga Jual Produk dalam satuan Currency');
            $table->integer('quantity')->length(6)->default(1)->comment('Jumlah Qty barang yang dibeli');
            $table->string('unit', 5)->comment('Satuan Jual Produk');
            $table->double('subtotal', 10, 2)->comment('Total Harga Jual per Item');
            $table->string('currency', 5)->comment('Satuan Harga Jual');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_detail');
    }
};
