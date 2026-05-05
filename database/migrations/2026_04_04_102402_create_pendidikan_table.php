<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendidikanTable extends Migration
{
    public function up()
    {
        Schema::create('pendidikan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('tingkat');
            $table->integer('tahun_masuk');
            $table->integer('tahun_keluar');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pendidikan');
    }
}