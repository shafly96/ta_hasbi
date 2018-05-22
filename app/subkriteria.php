<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subkriteria extends Model
{
	protected $table = 'sub_kriteria';
    protected $fillable = [
        'nama', 'id_kriteria',
    ];
}
