<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subkriteria extends Model
{
	protected $table = 'sub_kriteria';
    protected $fillable = [
        'sub_kriteria', 'id_kriteria',
    ];
}
