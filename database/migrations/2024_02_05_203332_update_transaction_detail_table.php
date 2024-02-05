<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::table('transaction_detail', function (Blueprint $table) {
            $table->double('price')->comment('Harga Jual Produk dalam satuan Currency')->nullable(true)->default(0)->change();
            $table->double('subtotal')->comment('Total Harga Jual per Item')->nullable(true)->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::table('transaction_detail', function (Blueprint $table) {
            $table->double('price', 6, 2)->comment('Harga Jual Produk dalam satuan Currency');
            $table->double('subtotal', 10, 2)->comment('Total Harga Jual per Item');
        });
    }
};
