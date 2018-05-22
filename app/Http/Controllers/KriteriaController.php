<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Datatables;

class KriteriaController extends Controller
{
    public function index(){
    	return view('kriteria.index');
    }

    public function data(){
    	$data = DB::table('kriteria')
        ->leftjoin('sub_kriteria','kriteria.id','=','sub_kriteria.id_kriteria')
        ->select('kriteria.id', DB::raw('count(sub_kriteria.sub_kriteria) as jumlah'))
        ->groupby('kriteria.id');

        return Datatables::of($data)->make(true);
    }

    public function create(){
    	return view('kriteria.create');
    }
}
