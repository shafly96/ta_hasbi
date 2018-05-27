<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\perhitungan;
use App\perhitungan_pilihan;
use App\galangan;
use App\subkriteria;
use App\kriteria;
use Datatables;
use DB;

class PerhitunganController2 extends Controller
{
    public function index(){
    	$galangan = galangan::all();
    	$subkriteria = DB::table('sub_kriteria')
    	->select('id','kriteria', 'sub_kriteria')
    	->get();

    	return view('perhitungan.index', compact('galangan', 'subkriteria'));
    }

    public function data(){
        return Datatables::of(perhitungan::query())->make(true);
    }

     public function store(Request $request){
        $perhitungan = new perhitungan;
        $perhitungan->nama = $request->nama;
        $perhitungan->save();

        for($i=0; $i<count($request->galangan); $i++){
        	$pilihan = new perhitungan_pilihan;
        	$pilihan->id_pilihan = $request->galangan[$i];
        	$pilihan->id_perhitungan = $perhitungan->id;
        	$pilihan->save();
        	$status = 'berhasil';
        }

        for($i=0; $i<count($request->subkriteria); $i++){
        	$pilihan = new perhitungan_pilihan;
        	$pilihan->id_pilihan = $request->subkriteria[$i];
        	$pilihan->id_perhitungan = $perhitungan->id;
        	$pilihan->save();
        	$status = 'berhasil';
        }

        if($status == 'berhasil') return redirect('perhitungan')->with('success', 'Data berhasil disimpan');
        else return redirect('perhitungan')->with('failed', 'Data gagal disimpan');
    }

    public function destroy($id)
    {
        $data = perhitungan::find($id);

        if($data->delete()) return redirect('perhitungan')->with('success', 'Data berhasil dihapus');
        else return redirect('perhitungan')->with('failed', 'Data gagal dihapus');
    }

    public function perbandingan($id){
    	$data = perhitungan_pilihan::where('id_perhitungan','=',$id)->get();
    	$array = [];

    	foreach ($data as $key => $value) {
    		$array[$key]['id'] = $value->id_pilihan;

    		if(substr($value->id_pilihan,0,1) == 'G'){
    			$cek = galangan::find(substr($value->id_pilihan,1,2));
    			$array[$key]['nama'] = $cek->nama;
    		}else{
    			$cek = subkriteria::find(substr($value->id_pilihan,1,2));
    			$array[$key]['nama'] = $cek->sub_kriteria;
    		}
    	}

        dd($array);

    	return view('perhitungan.perbandingan');
    }
}
