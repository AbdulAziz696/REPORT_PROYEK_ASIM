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
            $table->text('nama_pangggilan');
            $table->text('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->integer('waktu_magang');
            $table->integer('lama_waktu-magang');
            $table->text('jurusan_sekolah');
            $table->longText('alamat_domisili');
            $table->Text('nama_sekolah');
            $table->longText('alamat_sekolah');
            $table->text('hobi');
            $table->json('penghargaan');
            $table->json('serifikasi');
            $table->json('keahlian_khusus');
            $table->json('no_hp');
            $table->json('no_hp_wali');
            $table->json('harapan_magang');
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
