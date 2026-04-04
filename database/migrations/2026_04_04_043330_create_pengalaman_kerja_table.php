<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengalamanKerjaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengalaman_kerja', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            // === TAMBAHKAN KODE INI DI SINI ===
            $table->string('nama');
            $table->string('jabatan');
            $table->year('tahun_masuk');
            $table->year('tahun_keluar');
            // === AKHIR KODE TAMBAHAN ===
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengalaman_kerja');
    }
}