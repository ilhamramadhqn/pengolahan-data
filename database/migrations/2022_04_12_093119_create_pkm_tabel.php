<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePkmTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pkm', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fakultas_id')->unsigned();
            $table->foreign('fakultas_id')->references('id')->on('fakultas')->OnDelete('cascade')->OnUpdate('cascade');
            $table->integer('prodi_id')->unsigned();
            $table->foreign('prodi_id')->references('id')->on('prodi')->OnDelete('cascade')->OnUpdate('cascade');
            $table->string('nama_ketua');
            $table->string('nama_anggotaone');
            $table->string('nama_anggotatwo');
            $table->string('nama_anggotathree');
            $table->string('judul_pkm');
            $table->string('link');
            $table->date('lama_kegiatan');
            $table->string('sumber_dana_pkm');
            $table->integer('dana_pkm');
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
        Schema::dropIfExists('pkm');
    }
}
