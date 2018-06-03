<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class eigen extends Model
{
    protected $table = 'eigen';
    protected $fillable = [
        'id_pilihan', 'id_perhitungan', 'cluster', 'eigen'
    ];
}
