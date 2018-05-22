<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class galangan extends Model
{
	protected $table = 'galangan';
    protected $fillable = [
        'nama', 'logo', 'deskripsi', 'jenis_kapal', 'jenis_ukuran',
    ];
}
