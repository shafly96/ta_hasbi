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
use App\eigen;
use App\perbandingan_cluster;
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
        $array2 = [];

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

                $sumrow = 0;

                foreach ($tes as $key2 => $value2) {
                    $kiri = explode('-',$value2->kiri);
                    $kanan = explode('-',$value2->kanan);

                    if($value->id_pilihan==$kiri[1]){
                        $balik = -1 * $value2->value;

                        if($balik < 0){
                            $sumrow = $sumrow + (1/(-1 * $balik));
                        }else{
                            $sumrow+=$balik;
                        }
                    }elseif($value->id_pilihan==$kanan[1]){
                        if($value2->value < 0){
                            $sumrow = $sumrow + (1/(-1 * $value2->value));
                        }else{
                            $sumrow+=$value2->value;
                        }
                    }
                }

                $sumrow+=1;
                $array2[$key]['sumrow'] = $sumrow;

                if(substr($value->id_pilihan,0,1) == 'G'){
                    $cek = galangan::find(substr($value->id_pilihan,1,2));
                    $array[$key]['nama'] = $cek->nama;
                    $array2[$key]['nama'] = $cek->nama;
                    $array2[$key]['id'] = 'G'.$cek->id;
                }else if(substr($value->id_pilihan,0,1) == 'S'){
                    $cek = subkriteria::find(substr($value->id_pilihan,1,2));
                    $array[$key]['nama'] = $cek->sub_kriteria;
                    $array2[$key]['nama'] = $cek->sub_kriteria;
                    $array2[$key]['id'] = 'S'.$cek->id;
                }else{
                    $cek = subkriteria::find(substr($value->id_pilihan,1,2));
                    $array[$key]['nama'] = $cek->kriteria;
                    $array2[$key]['nama'] = $cek->kriteria;
                    $array2[$key]['id'] = 'K'.$cek->id;
                }
            }

            foreach ($data as $key => $value) {
                for ($i=0; $i<count($tes); $i++) {
                    $kiri = explode('-',$tes[$i]->kiri);
                    $kanan = explode('-',$tes[$i]->kanan);

                    if($value->id_pilihan==$kiri[1]){
                        if($tes[$i]->value < 0){
                            $array2[$key]['kolom'][] = (1/(-1 * $tes[$i]->value));
                        }else{
                            $array2[$key]['kolom'][] = $tes[$i]->value;
                        }
                    }elseif($value->id_pilihan==$kanan[1]){
                        $balik = -1 * $tes[$i]->value;

                        if($balik < 0){
                            $array2[$key]['kolom'][] = (1/(-1 * $balik));
                        }else{
                            $array2[$key]['kolom'][] = $balik;
                        }
                    }
                }
            }

            foreach ($data as $key => $value) {
                $index=0;
                $sumcol=0;
                for ($i=0; $i<count($array2); $i++) {
                    if($key==$i){
                        $sumcol = $sumcol + (1/$array2[$i]['sumrow']);
                        $index=$i;
                    }else{
                        $sumcol = $sumcol + ($array2[$key]['kolom'][$index]/$array2[$i]['sumrow']);
                        $index++;
                    }
                }
                $array2[$key]['sumcol'] = $sumcol;
                $array2[$key]['eigen'] = $sumcol/count($data);

                $id_pilihan = explode('-',$request->node);

                $eigen = eigen::where('id_perhitungan','=',$value->id_perhitungan)->where('id_pilihan','=',$id_pilihan[1])->where('cluster','=',$array2[$key]['id'])->get();

                if(count($eigen)==0){
                    $eigen = new eigen;
                    $eigen->id_perhitungan = $value->id_perhitungan;
                    $eigen->id_pilihan = $id_pilihan[1];
                    $eigen->cluster = $array2[$key]['id'];
                    $eigen->eigen = $array2[$key]['eigen'];
                    $eigen->save();
                }else{
                    $eigen[0]->eigen = $array2[$key]['eigen'];
                    $eigen[0]->save(); 
                }
            }
        }

        $total = 0;

        for($i=count($data); $i>0; $i--){
            $cek = $i-1;
            $total+=$cek;
        }

        return view('perhitungan.ajaxform', compact('array','total','array2'));
    }

    public function simpan(Request $request, $id){
        $data = perhitungan_pilihan::where('id_perhitungan','=',$id)->where('id_pilihan','like',$request->cluster.'%')->get();
        $tes = perhitungan_perbandingan::where('id_perhitungan','=',$id)->where('id_pilihan','=',$request->node)->where('cluster','=',$request->cluster)->get();

        if(count($tes)>0){
            $tes = perhitungan_perbandingan::where('id_perhitungan','=',$id)->where('id_pilihan','=',$request->node)->where('cluster','=',$request->cluster)->delete();
        }

        for($i=0; $i<count($request->value); $i++){
            $data = new perhitungan_perbandingan;
            $data->id_perhitungan = $id;
            $data->id_pilihan = $request->node;
            $data->cluster = $request->cluster;
            $data->value = $request->value[$i];
            $data->kiri = $request->kiri[$i];
            $data->kanan = $request->kanan[$i];
            $data->save();
        }

        $data = perhitungan_pilihan::where('id_perhitungan','=',$id)->where('id_pilihan','like',$request->cluster.'%')->get();
        $tes = perhitungan_perbandingan::where('id_perhitungan','=',$id)->where('id_pilihan','=',$request->node)->where('cluster','=',$request->cluster)->get();

        $array = [];
        $array2 = [];

        foreach ($data as $key => $value) {
                $array[$key]['id'] = $value->id.'-'.$value->id_pilihan;
                if(isset($tes[$key]->value)) $array[$key]['value'] = $tes[$key]->value;

                $sumrow = 0;

                foreach ($tes as $key2 => $value2) {
                    $kiri = explode('-',$value2->kiri);
                    $kanan = explode('-',$value2->kanan);

                    if($value->id_pilihan==$kiri[1]){
                        $balik = -1 * $value2->value;

                        if($balik < 0){
                            $sumrow = $sumrow + (1/(-1 * $balik));
                        }else{
                            $sumrow+=$balik;
                        }
                    }elseif($value->id_pilihan==$kanan[1]){
                        if($value2->value < 0){
                            $sumrow = $sumrow + (1/(-1 * $value2->value));
                        }else{
                            $sumrow+=$value2->value;
                        }
                    }
                }

                $sumrow+=1;
                $array2[$key]['sumrow'] = $sumrow;

                if(substr($value->id_pilihan,0,1) == 'G'){
                    $cek = galangan::find(substr($value->id_pilihan,1,2));
                    $array[$key]['nama'] = $cek->nama;
                    $array2[$key]['nama'] = $cek->nama;
                    $array2[$key]['id'] = 'G'.$cek->id;
                }else if(substr($value->id_pilihan,0,1) == 'S'){
                    $cek = subkriteria::find(substr($value->id_pilihan,1,2));
                    $array[$key]['nama'] = $cek->sub_kriteria;
                    $array2[$key]['nama'] = $cek->sub_kriteria;
                    $array2[$key]['id'] = 'S'.$cek->id;
                }else{
                    $cek = subkriteria::find(substr($value->id_pilihan,1,2));
                    $array[$key]['nama'] = $cek->kriteria;
                    $array2[$key]['nama'] = $cek->kriteria;
                    $array2[$key]['id'] = 'K'.$cek->id;
                }
            }

            foreach ($data as $key => $value) {
                for ($i=0; $i<count($tes); $i++) {
                    $kiri = explode('-',$tes[$i]->kiri);
                    $kanan = explode('-',$tes[$i]->kanan);

                    if($value->id_pilihan==$kiri[1]){
                        if($tes[$i]->value < 0){
                            $array2[$key]['kolom'][] = (1/(-1 * $tes[$i]->value));
                        }else{
                            $array2[$key]['kolom'][] = $tes[$i]->value;
                        }
                    }elseif($value->id_pilihan==$kanan[1]){
                        $balik = -1 * $tes[$i]->value;

                        if($balik < 0){
                            $array2[$key]['kolom'][] = (1/(-1 * $balik));
                        }else{
                            $array2[$key]['kolom'][] = $balik;
                        }
                    }
                }
            }

            foreach ($data as $key => $value) {
                $index=0;
                $sumcol=0;
                for ($i=0; $i<count($array2); $i++) {
                    if($key==$i){
                        $sumcol = $sumcol + (1/$array2[$i]['sumrow']);
                        $index=$i;
                    }else{
                        $sumcol = $sumcol + ($array2[$key]['kolom'][$index]/$array2[$i]['sumrow']);
                        $index++;
                    }
                }
                $array2[$key]['sumcol'] = $sumcol;
                $array2[$key]['eigen'] = $sumcol/count($data);

                $id_pilihan = explode('-',$request->node);

                $eigen = eigen::where('id_perhitungan','=',$value->id_perhitungan)->where('id_pilihan','=',$id_pilihan[1])->where('cluster','=',$array2[$key]['id'])->get();

                if(count($eigen)==0){
                    $eigen = new eigen;
                    $eigen->id_perhitungan = $value->id_perhitungan;
                    $eigen->id_pilihan = $id_pilihan[1];
                    $eigen->cluster = $array2[$key]['id'];
                    $eigen->eigen = $array2[$key]['eigen'];
                    $eigen->save();
                }else{
                    $eigen[0]->eigen = $array2[$key]['eigen'];
                    $eigen[0]->save(); 
                }
            }

        return redirect()->to('perhitungan/perbandingan/'.$id);
    }

    public function hasil($id){
        $pilihan = perhitungan_pilihan::where('id_perhitungan', $id)->get();
        $eigen = eigen::where('id_perhitungan', $id)->get();
        $cluster = perbandingan_cluster::where('id_perhitungan', $id)->get();

        $unweight = [];
        $weight = [];
        $limit = [];
        $n_limit = [];

        $span['g'] = 0;
        $span['k'] = 0;
        $span['s'] = 0;

        for($i=0; $i<count($pilihan); $i++){
            $unweight[0][$i+1] = $pilihan[$i]->id_pilihan;
            $unweight[$i+1][0] = $pilihan[$i]->id_pilihan;

            $weight[0][$i+1] = $pilihan[$i]->id_pilihan;
            $weight[$i+1][0] = $pilihan[$i]->id_pilihan;

            $limit[0][$i+1] = $pilihan[$i]->id_pilihan;
            $limit[$i+1][0] = $pilihan[$i]->id_pilihan;

            $n_limit[0][$i+1] = $pilihan[$i]->id_pilihan;
            $n_limit[$i+1][0] = $pilihan[$i]->id_pilihan;

            if(substr($pilihan[$i]->id_pilihan,0,1) == 'G'){
                $cek = galangan::find(substr($pilihan[$i]->id_pilihan,1,2));
                $nama[$i] = $cek->nama;
                $span['g'] = $span['g'] + 1;
            }else if(substr($pilihan[$i]->id_pilihan,0,1) == 'S'){
                $cek = subkriteria::find(substr($pilihan[$i]->id_pilihan,1,2));
                $nama[$i] = $cek->sub_kriteria;
                $span['s'] = $span['s'] + 1;
            }else{
                $cek = subkriteria::find(substr($pilihan[$i]->id_pilihan,1,2));
                $nama[$i] = $cek->kriteria;
                $span['k'] = $span['k'] + 1;
            }
        }

        $cek = [];

        for($i=0; $i<count($eigen); $i++){
            for($j=1; $j<count($unweight); $j++){
                if($eigen[$i]->cluster == $unweight[$j][0]) $x = $j;
                if($eigen[$i]->id_pilihan == $unweight[0][$j]) $y = $j;
            }

            if(substr($eigen[$i]->id_pilihan,0,1) == 'G') $weight[$x][$y] = $eigen[$i]->eigen * $cluster[0]->eigen;
            else if(substr($eigen[$i]->id_pilihan,0,1) == 'K') $weight[$x][$y] = $eigen[$i]->eigen * $cluster[1]->eigen;
            else if(substr($eigen[$i]->id_pilihan,0,1) == 'S') $weight[$x][$y] = $eigen[$i]->eigen * $cluster[2]->eigen;
                
            $limit[$x][$y] = round($weight[$x][$y], 2);
            $unweight[$x][$y] = $eigen[$i]->eigen;
        }

        $v = [];

        for($i=1; $i<4; $i++){
            $v[] = $limit[$i][4]*100;
            $v[] = $limit[$i][5]*100;
            $v[] = $limit[$i][6]*100;
            $v[] = $limit[$i][7]*100;

            $max = $v[0];
            for($j=0; $j<count($v); $j++){
                if($v[$j]>$max) $max=$v[$j];
            }

            $kali = 1;

            while (1) {
                $kpk = $max * $kali;
                if($kpk%$v[0]==0 && $kpk%$v[1]==0 && $kpk%$v[2]==0 && $kpk%$v[3]==0) break;
                else $kali++;
            }

            $limit[$i][4] = $kpk/100;
            $limit[$i][5] = $kpk/100;
            $limit[$i][6] = $kpk/100;
            $limit[$i][7] = $kpk/100;
        }

        $urutan = [];

        for($i=1; $i<4; $i++){
            $urutan['value'][$i] = $limit[$i][$i+3];
            $urutan['kode'][$i] = $limit[$i][0];
            for($j=4; $j<7; $j++){
                if($limit[$i][$j] > $urutan['value'][$i]){
                    $urutan['value'][$i] = $limit[$i][$j];
                    $urutan['kode'][$i] = $limit[$i][0];
                }
            }
        }

        dd($urutan);
        

        return view('perhitungan.matriks', compact('nama','span','unweight','weight'));
    }

    public function cluster($id){
        $array = [];

        $array['id'] = $id;
        $array['data'] = perbandingan_cluster::where('id_perhitungan','=',$id)->get();

        return view('perhitungan.cluster', compact('array'));
    }

    public function cluster_simpan(Request $request, $id){
        $array = [];

        $array['id'] = $id;
        $array['data'] = perbandingan_cluster::where('id_perhitungan','=',$id)->get();

        $balik1 = -1 * $request->value[0];
        $balik2 = -1 * $request->value[1];
        $balik3 = -1 * $request->value[2];

        $normal1 = $request->value[0];
        $normal2 = $request->value[1];
        $normal3 = $request->value[2];

        if($balik1 < 0) $balik1 = 1 / (-1 * $balik1);
        if($balik2 < 0) $balik2 = 1 / (-1 * $balik2);
        if($balik3 < 0) $balik3 = 1 / (-1 * $balik3);

        if($normal1 < 0) $normal1 = 1 / (-1 * $normal1);
        if($normal2 < 0) $normal2 = 1 / (-1 * $normal2);
        if($normal3 < 0) $normal3 = 1 / (-1 * $normal3);


         $sumrow1 = 1 + $balik1 + $balik2;
         $sumrow2 = 1 + $normal1 + $balik3;
         $sumrow3 = 1 + $normal2 + $normal3;

         $sumcol[0] = (1 / $sumrow1) + ($normal1 / $sumrow2) + ($normal2 / $sumrow3);
         $sumcol[1] = (1 / $sumrow2) + ($balik1 / $sumrow1) + ($normal3 / $sumrow3);
         $sumcol[2] = (1 / $sumrow3) + ($balik2 / $sumrow1) + ($balik3 / $sumrow2);

        if(count($array['data'])==0){
            for($i=0; $i<3; $i++){
                $cluster = new perbandingan_cluster;
                $cluster->id_perhitungan = $id;
                $cluster->cluster1 = $request->kiri[$i];
                $cluster->cluster2 = $request->kanan[$i];
                $cluster->value = $request->value[$i];
                $cluster->eigen = $sumcol[$i]/3;
                $cluster->save();
            }
        }else{
            for($i=0; $i<3; $i++){
                $array['data'][$i]->value = $request->value[$i];
                $array['data'][$i]->eigen = $sumcol[$i]/3;
                $array['data'][$i]->save();
            }
        }

        return redirect()->to('perhitungan/cluster/'.$id);
    }
}
