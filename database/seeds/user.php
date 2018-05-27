<?php

use Illuminate\Database\Seeder;

class user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nama' => 'Admin',
            'perusahaan' => 'Admin',
            'alamat' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('secret')
        ]);
    }
}
