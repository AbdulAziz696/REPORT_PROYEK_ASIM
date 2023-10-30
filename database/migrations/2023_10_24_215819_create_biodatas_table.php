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
        Schema::create('biodatas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->text('nama_panggilan')->nullable();
            $table->text('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            // $table->integer('waktu_magang')->nullable();
            $table->integer('lama_waktu_magang')->nullable();
            $table->text('jurusan_sekolah')->nullable();
            $table->longText('alamat_domisili')->nullable();
            $table->Text('nama_sekolah')->nullable();
            $table->longText('alamat_sekolah')->nullable();
            $table->text('hobi')->nullable();
            $table->longText('penghargaan')->nullable();
            $table->longText('sertifikasi')->nullable();
            $table->longText('keahlian_khusus')->nullable();
            $table->longText('no_hp')->nullable();
            $table->longText('no_hp_wali')->nullable();
            $table->longText('harapan_magang')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biodatas');
    }
};
