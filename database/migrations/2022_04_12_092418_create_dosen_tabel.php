<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDosenTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dosen', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('prodi_id')->unsigned();
            $table->foreign('prodi_id')->references('id')->on('prodi')->OnDelete('cascade')->OnUpdate('cascade');
            $table->char('kode_dosen', 3)->unique();
            $table->char('nidn', 10)->unique();
            $table->string('nama_dosen', 50);
            $table->string('jabfung_dosen', 20);
            $table->longText('alamat_dosen', 50);
            $table->string('kota_dosen', 25);
            $table->string('prov_dosen', 25);
            $table->string('telp_dosen', 25);
            $table->string('email', 30);
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
        Schema::dropIfExists('dosen');
    }
}
