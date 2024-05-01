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
        Schema::create('akun_saldo_awal', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('akun_id');
            $table->date('tanggal');    
            $table->decimal('debit', 30, 2);
            $table->decimal('kredit', 30, 2);
            $table->timestamp('dibuat_pada')->nullable();
            $table->unsignedBigInteger('dibuat_user_id')->nullable();
            $table->timestamp('diubah_pada')->nullable();
            $table->unsignedBigInteger('diubah_user_id')->nullable();
            $table->timestamp('dihapus_pada')->nullable();
            $table->unsignedBigInteger('dihapus_user_id')->nullable();

            $table->foreign('akun_id')->references('id')->on('akun');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akun_saldo_awal');
    }
};
