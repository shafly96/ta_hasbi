<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Galangan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galangan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('logo');
            $table->longText('deskripsi');
            $table->string('jenis_kapal');
            $table->string('jenis_ukuran');
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
        Schema::dropIfExists('galangan');
    }
}
