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
        Schema::create('jurnal', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jenis_jurnal_id');
            $table->date('tanggal');
            $table->string('keterangan');
            $table->string('status');
            $table->timestamp('dibuat_pada')->nullable();
            $table->unsignedBigInteger('dibuat_user_id')->nullable();
            $table->timestamp('diubah_pada')->nullable();
            $table->unsignedBigInteger('diubah_user_id')->nullable();
            $table->timestamp('dihapus_pada')->nullable();
            $table->unsignedBigInteger('dihapus_user_id')->nullable();

            $table->foreign('jenis_jurnal_id')->references('id')->on('jenis_jurnal');

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
        Schema::dropIfExists('jurnal');
    }
};
