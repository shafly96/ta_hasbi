<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Eigen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eigen', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_perhitungan');
            $table->string('id_pilihan');
            $table->string('cluster');
            $table->float('eigen');
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
