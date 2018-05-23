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
    	$data = DB::table('kriteria')
        ->leftjoin('sub_kriteria','kriteria.id','=','sub_kriteria.id_kriteria')
        ->select('kriteria.id', 'kriteria.kriteria', DB::raw('count(sub_kriteria.sub_kriteria) as jumlah'))
        ->groupby('kriteria.id');

        //sadafdasf

        return Datatables::of($data)->make(true);
    }

    public function create(){
    	return view('kriteria.create');
    }

    public function store(Request $request){
        $data = new kriteria;
        $data->kriteria = $request->kriteria;
        $data->save();

        for($i=0; $i<count($request->input); $i++){
            $data_sub = new subkriteria;
            $data_sub->id_kriteria = $data->id;
            $data_sub->sub_kriteria = $request->input[$i];

            if($data_sub->save()) $status = 'oke';
            else $status = 'fail';
        }

        if($status == 'oke') return redirect('kriteria')->with('success', 'Data berhasil disimpan');
        else return redirect('kriteria')->with('failed', 'Data gagal disimpan');
    }

    public function destroy($id)
    {
        $data = kriteria::find($id);

        if($data->delete()) return redirect('kriteria')->with('success', 'Data berhasil dihapus');
        else return redirect('kriteria')->with('failed', 'Data gagal dihapus');
    }

    public function edit($id)
    {
        $data = kriteria::find($id);
        $data_sub = subkriteria::where('id_kriteria','=',$id)->get();
        return view('kriteria.edit', compact('data','data_sub'));
    }

    public function update(Request $request, $id){
        $data = kriteria::find($id);
        $data->delete();

        $data = new kriteria;
        $data->kriteria = $request->kriteria;
        $data->save();

        for($i=0; $i<count($request->input); $i++){
            $data_sub = new subkriteria;
            $data_sub->id_kriteria = $data->id;
            $data_sub->sub_kriteria = $request->input[$i];

            if($data_sub->save()) $status = 'oke';
            else $status = 'fail';
        }

        if($status == 'oke') return redirect('kriteria')->with('success', 'Data berhasil disimpan');
        else return redirect('kriteria')->with('failed', 'Data gagal disimpan');
    }
}
