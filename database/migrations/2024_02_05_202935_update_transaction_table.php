<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::table('transaction', function (Blueprint $table) {
            $table->double('total')->comment('Total Harga Jual')->nullable(true)->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::table('transaction', function (Blueprint $table) {
            $table->double('total', 10, 2)->comment('Total Harga Jual');
        });
    }
};
