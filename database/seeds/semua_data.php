<?php

use Illuminate\Database\Seeder;

class semua_data extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(user::class);
        $this->call(galangan::class);
        $this->call(subkriteria::class);
    }
}
