<?php

use Illuminate\Database\Seeder;

class galangan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('galangan')->insert(array(
        	array('nama'=>'PT Adiluhung', 'deskripsi'=>'PT Adiluhung'),
        	array('nama'=>'PT IKI', 'deskripsi'=>'PT IKI')
        ));
    }
}
