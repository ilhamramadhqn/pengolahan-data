<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHakciptaTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hakcipta', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('daftar_penelitian_id')->unsigned();
            $table->foreign('daftar_penelitian_id')->references('id')->on('daftar_penelitian')->OnDelete('cascade')->OnUpdate('cascade');
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
        Schema::dropIfExists('hakcipta');
    }
}
