<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarPenelitianTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_penelitian', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fakultas_id')->unsigned();
            $table->foreign('fakultas_id')->references('id')->on('fakultas')->OnDelete('cascade')->OnUpdate('cascade');
            $table->integer('prodi_id')->unsigned();
            $table->foreign('prodi_id')->references('id')->on('prodi')->OnDelete('cascade')->OnUpdate('cascade');
            $table->integer('publikasi_id')->unsigned();
            $table->foreign('publikasi_id')->references('id')->on('jenis_publikasi')->OnDelete('cascade')->OnUpdate('cascade');
            $table->integer('kategori_jurnal_id')->unsigned();
            $table->foreign('kategori_jurnal_id')->references('id')->on('kategori_jurnal')->OnDelete('cascade')->OnUpdate('cascade');
            $table->integer('pen_id')->unsigned();
            $table->foreign('pen_id')->references('id')->on('peneliti')->OnDelete('cascade')->OnUpdate('cascade');
            $table->string('judul_penelitian');
            $table->string('jenis_peneliti');
            $table->string('tema');
            $table->integer('volume_jurnal');
            $table->integer('no_jurnal');
            $table->string('link');
            $table->string('lama_penelitian');
            $table->string('sumber_dana');
            $table->integer('dana_penelitian');
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
        Schema::dropIfExists('daftar_penelitian');
    }
}
