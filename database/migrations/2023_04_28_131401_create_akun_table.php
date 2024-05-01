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
        Schema::create('akun', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('akun_id')->nullable();
            $table->unsignedBigInteger('jenis_akun_id')->nullable();
            $table->string('nama');
            $table->string('saldo_normal');
            $table->string('jenis_laporan');            
            $table->timestamp('dibuat_pada')->nullable();
            $table->unsignedBigInteger('dibuat_user_id')->nullable();
            $table->timestamp('diubah_pada')->nullable();
            $table->unsignedBigInteger('diubah_user_id')->nullable();
            $table->timestamp('dihapus_pada')->nullable();
            $table->unsignedBigInteger('dihapus_user_id')->nullable();

            $table->foreign('akun_id')->references('id')->on('akun');
            $table->foreign('jenis_akun_id')->references('id')->on('jenis_akun');
            $table->foreign('dibuat_user_id')->references('id')->on('users');
            $table->foreign('diubah_user_id')->references('id')->on('users');
            $table->foreign('dihapus_user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akun');
    }
};
