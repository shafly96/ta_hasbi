<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\galangan;
use Datatables;
use Image;
use File;

class GalanganController extends Controller
{
    public function index(){
    	return view('galangan.index');
    }

    public function data(){
        return Datatables::of(galangan::query())->make(true);
    }


    public function create(){
    	return view('galangan.create');
    }

    public function store(Request $request){
    	$data = new galangan;
    	$data->nama = $request->nama;
    	$data->deskripsi = $request->deskripsi;
    	$data->jenis_kapal = $request->jenis_kapal;
    	$data->jenis_ukuran = $request->jenis_ukuran;

    	$image = $request->file('logo');
        $filename  = date('m-d-Y_hia').'.'.$image->getClientOriginalExtension();
        $path = public_path('\assets\img\gambar\img-'.$filename);
        Image::make($image->getRealPath())->save($path);

    	$data->logo = $filename;
    	if($data->save()) return redirect('galangan')->with('success', 'Data berhasil disimpan');
    	else return redirect('galangan')->with('failed', 'Data gagal disimpan');
    }

    public function destroy($id)
    {
        $data = galangan::find($id);
        $hapus = public_path('\assets\img\gambar\img-'.$data->logo);
        File::delete($hapus);

        if($data->delete()) return redirect('galangan')->with('success', 'Data berhasil dihapus');
    	else return redirect('galangan')->with('failed', 'Data gagal dihapus');
    }

    public function edit($id)
    {
        $data = galangan::find($id);
        return view('galangan.edit', compact('data'));
    }

    public function update(Request $request, $id){
        $data = galangan::find($id);
        $data->nama = $request->nama;
        $data->deskripsi = $request->deskripsi;
        $data->jenis_kapal = $request->jenis_kapal;
        $data->jenis_ukuran = $request->jenis_ukuran;

        if(!is_null($request->logo)){
            $hapus = public_path('\assets\img\gambar\img-'.$data->logo);
            File::delete($hapus);

            $image = $request->file('logo');
            $filename  = date('m-d-Y_hia').'.'.$image->getClientOriginalExtension();
            $path = public_path('\assets\img\gambar\img-'.$filename);
            Image::make($image->getRealPath())->save($path);

            $data->logo = $filename;
        }

        if($data->save()) return redirect('galangan')->with('success', 'Data berhasil disimpan');
        else return redirect('galangan')->with('failed', 'Data gagal disimpan');
    }

}
