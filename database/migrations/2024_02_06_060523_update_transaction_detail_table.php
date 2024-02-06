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
            $table->integer('product_id')->nullable(true)->after('document_number');
            $table->string('product_name')->nullable(true)->after('product_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::table('transaction_detail', function (Blueprint $table) {
            $table->dropColumn(['product_id', 'product_name']);
        });
    }
};
