<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\perhitungan;
use Datatables;

class PerhitunganController extends Controller
{
    public function index(){
    	return view('perhitungan.index');
    }

    public function data(){
        return Datatables::of(perhitungan::query())->make(true);
    }

     public function store(Request $request){
        $data = new perhitungan;
        $data->nama = $request->nama;

        if($data->save()) return redirect('perhitungan')->with('success', 'Data berhasil disimpan');
        else return redirect('perhitungan')->with('failed', 'Data gagal disimpan');
    }

    public function destroy($id)
    {
        $data = perhitungan::find($id);

        if($data->delete()) return redirect('perhitungan')->with('success', 'Data berhasil dihapus');
        else return redirect('perhitungan')->with('failed', 'Data gagal dihapus');
    }
}
