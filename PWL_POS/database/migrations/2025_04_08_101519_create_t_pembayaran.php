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
        Schema::create('t_pembayaran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("penjualan_id");
            $table->integer("jumlah_bayar");
            $table->timestamps();
            $table->foreign("penjualan_id")->references("penjualan_id")->on("t_penjualan");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_pembayaran');
    }
};
