<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PerbandinganCluster extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perbandingan_cluster', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_perhitungan');
            $table->string('cluster1');
            $table->string('cluster2');
            $table->integer('value');
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
