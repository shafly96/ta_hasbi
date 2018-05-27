<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PerhitunganPilihan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perhitungan_pilihan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_pilihan');
            $table->unsignedInteger('id_perhitungan');
            $table->timestamps();

            $table->foreign('id_perhitungan')->references('id')->on('perhitungan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perhitungan_pilihan');
    }
}
