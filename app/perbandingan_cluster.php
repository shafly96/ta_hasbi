<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class perbandingan_cluster extends Model
{
    protected $table = 'perbandingan_cluster';
    protected $fillable = [
        'id_perhitungan', 'cluster1', 'cluster2', 'value', 'eigen'
    ];
}
