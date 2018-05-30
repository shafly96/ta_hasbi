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
            $table->unsignedInteger('id_perhitungan');
            $table->string('id_pilihan');
            $table->string('cluster');
            $table->string('kiri');
            $table->string('kanan');
            $table->string('value');
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
        //
    }
}
