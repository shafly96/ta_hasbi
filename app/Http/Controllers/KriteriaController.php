<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\kriteria;
use App\subkriteria;
use DB;
use Datatables;

class KriteriaController extends Controller
{
    public function index(){
    	return view('kriteria.index');
    }

    public function data(){
    	$data = DB::table('sub_kriteria')
        ->select('kriteria', DB::raw('count(kriteria) as jumlah'))
        ->groupby('kriteria');

        return Datatables::of($data)->make(true);
    }

    public function create(){
    	return view('kriteria.create');
    }

    public function store(Request $request){
        for($i=0; $i<count($request->input); $i++){
            $data_sub = new subkriteria;
            $data_sub->kriteria = $request->kriteria;
            $data_sub->sub_kriteria = $request->input[$i];

            if($data_sub->save()) $status = 'oke';
            else $status = 'fail';
        }

        if($status == 'oke') return redirect('kriteria')->with('success', 'Data berhasil disimpan');
        else return redirect('kriteria')->with('failed', 'Data gagal disimpan');
    }

    public function destroy($id)
    {
        $data = subkriteria::where('kriteria','=',$id);

        if($data->delete()) return redirect('kriteria')->with('success', 'Data berhasil dihapus');
        else return redirect('kriteria')->with('failed', 'Data gagal dihapus');
    }

    public function edit($id)
    {
        $data_sub = subkriteria::where('kriteria','=',$id)->get();
        return view('kriteria.edit', compact('data_sub'));
    }

    public function update(Request $request, $id){
        $data = subkriteria::where('kriteria','=',$id);
        $data->delete();

        for($i=0; $i<count($request->input); $i++){
            $data_sub = new subkriteria;
            $data_sub->kriteria = $request->kriteria;
            $data_sub->sub_kriteria = $request->input[$i];

            if($data_sub->save()) $status = 'oke';
            else $status = 'fail';
        }

        if($status == 'oke') return redirect('kriteria')->with('success', 'Data berhasil disimpan');
        else return redirect('kriteria')->with('failed', 'Data gagal disimpan');
    }
}
