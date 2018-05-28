<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PerhitunganPerbandingan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perhitungan_perbandingan', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_pilihan');
            $table->string('cluster');
            $table->integer('value');
            $table->timestamps();

            $table->foreign('id_pilihan')->references('id')->on('perhitungan_pilihan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
