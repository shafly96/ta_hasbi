<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\perhitungan;
use App\perhitungan_pilihan;
use App\perhitungan_perbandingan;
use App\galangan;
use App\subkriteria;
use App\kriteria;
use Datatables;
use DB;

class PerhitunganController extends Controller
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
            if($i==0){
                $cek = subkriteria::find(substr($request->subkriteria[$i],1,2));
                $old = $cek;
                $kriteria = new perhitungan_pilihan;
                $kriteria->id_pilihan = 'K'.substr($request->subkriteria[$i],1,2);
                $kriteria->id_perhitungan = $perhitungan->id;
                $kriteria->save();

            }else{
                $cek = subkriteria::find(substr($request->subkriteria[$i],1,2));
                if($old->kriteria!=$cek->kriteria){
                    $kriteria = new perhitungan_pilihan;
                    $kriteria->id_pilihan = 'K'.substr($request->subkriteria[$i],1,2);
                    $kriteria->id_perhitungan = $perhitungan->id;
                    $kriteria->save();
                    $old=$cek;
                }
            }
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
    		$array[$key]['id'] = $value->id.'-'.$value->id_pilihan;

    		if(substr($value->id_pilihan,0,1) == 'G'){
    			$cek = galangan::find(substr($value->id_pilihan,1,2));
    			$array[$key]['nama'] = $cek->nama;
    		}else if(substr($value->id_pilihan,0,1) == 'S'){
    			$cek = subkriteria::find(substr($value->id_pilihan,1,2));
    			$array[$key]['nama'] = $cek->sub_kriteria;
    		}else{
                $cek = subkriteria::find(substr($value->id_pilihan,1,2));
                $array[$key]['nama'] = $cek->kriteria;
            }
    	}

    	return view('perhitungan.perbandingan', compact('array','id'));
    }

    public function generateForm(Request $request, $id){
        $data = perhitungan_pilihan::where('id_perhitungan','=',$id)->where('id_pilihan','like',$request->cluster.'%')->get();
        $tes = perhitungan_perbandingan::where('id_perhitungan','=',$id)->where('id_pilihan','=',$request->node)->where('cluster','=',$request->cluster)->get();

        $array = [];

        if(count($tes)==0){
            foreach ($data as $key => $value) {
                $array[$key]['id'] = $value->id.'-'.$value->id_pilihan;

                if(substr($value->id_pilihan,0,1) == 'G'){
                    $cek = galangan::find(substr($value->id_pilihan,1,2));
                    $array[$key]['nama'] = $cek->nama;
                }else if(substr($value->id_pilihan,0,1) == 'S'){
                    $cek = subkriteria::find(substr($value->id_pilihan,1,2));
                    $array[$key]['nama'] = $cek->sub_kriteria;
                }else{
                    $cek = subkriteria::find(substr($value->id_pilihan,1,2));
                    $array[$key]['nama'] = $cek->kriteria;
                }
            }
        }else{
            foreach ($data as $key => $value) {
                $array[$key]['id'] = $value->id.'-'.$value->id_pilihan;
                if(isset($tes[$key]->value)) $array[$key]['value'] = $tes[$key]->value;

                if(substr($value->id_pilihan,0,1) == 'G'){
                    $cek = galangan::find(substr($value->id_pilihan,1,2));
                    $array[$key]['nama'] = $cek->nama;
                }else if(substr($value->id_pilihan,0,1) == 'S'){
                    $cek = subkriteria::find(substr($value->id_pilihan,1,2));
                    $array[$key]['nama'] = $cek->sub_kriteria;
                }else{
                    $cek = subkriteria::find(substr($value->id_pilihan,1,2));
                    $array[$key]['nama'] = $cek->kriteria;
                }
            }
        }

        $total = 0;

        for($i=count($data); $i>0; $i--){
            $cek = $i-1;
            $total+=$cek;
        }

        return view('perhitungan.ajaxform', compact('array','total'));
    }

    public function simpan(Request $request, $id){
        $tes = perhitungan_perbandingan::where('id_perhitungan','=',$id)->where('id_pilihan','=',$request->node)->where('cluster','=',$request->cluster)->get();

        if(count($tes)>0) $tes = perhitungan_perbandingan::where('id_perhitungan','=',$id)->where('id_pilihan','=',$request->node)->where('cluster','=',$request->cluster)->delete();


        for($i=0; $i<count($request->value); $i++){
            $data = new perhitungan_perbandingan;
            $data->id_perhitungan = $id;
            $data->id_pilihan = $request->node;
            $data->cluster = $request->cluster;
            $data->value = $request->value[$i];
            $data->save();
        }

        return redirect()->to('perhitungan/perbandingan/'.$id);
    }
}
