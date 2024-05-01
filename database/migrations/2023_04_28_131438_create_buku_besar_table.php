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
        Schema::create('buku_besar', function (Blueprint $table) {
            $table->id();  
            $table->date('tanggal');
            $table->unsignedBigInteger('jurnal_id');
            $table->unsignedBigInteger('jurnal_detail_id');                      
            $table->unsignedBigInteger('akun_id');
            $table->decimal('debit', 30, 2);
            $table->decimal('kredit', 30, 2);
            $table->timestamp('dibuat_pada')->nullable();
            $table->unsignedBigInteger('dibuat_user_id')->nullable();
            $table->timestamp('diubah_pada')->nullable();
            $table->unsignedBigInteger('diubah_user_id')->nullable();
            $table->timestamp('dihapus_pada')->nullable();
            $table->unsignedBigInteger('dihapus_user_id')->nullable();

            $table->foreign('jurnal_id')->references('id')->on('jurnal');
            $table->foreign('jurnal_detail_id')->references('id')->on('jurnal_detail');
            $table->foreign('akun_id')->references('id')->on('akun');
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
        Schema::dropIfExists('buku_besar');
    }
};
