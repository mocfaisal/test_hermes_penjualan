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
        Schema::create('transaction', function (Blueprint $table) {
            $table->id();
            $table->string('document_code', 3)->comment('Kode Dokumen');
            $table->string('document_number', 10)->comment('Nomor Dokumen');
            $table->string('user', 50)->comment('User Login');
            $table->double('total', 10, 2)->comment('Total Harga Jual');
            $table->date('tgl_trx')->useCurrent()->comment('Tanggal Transaksi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction');
    }
};
