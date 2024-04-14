<?php

namespace App\Http\Controllers\AdminGudang;

use App\Http\Controllers\Controller;
use App\Models\MGudang;
use Illuminate\Http\Request;

class ControllerKelolaGudang extends Controller
{
    public function index()
    {
        $gudang = MGudang::all();
        $data = [
            'gudang'=>$gudang,
        ];
        return view('admin.kelolagudang', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function tambah()
    {
        return view('admin.tambah.tambahgudang');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function simpan(Request $request)
    {
        $request->validate([
            'nama_gudang'=>'required|string',
            'no_rak'=>'required|numeric',
            'no_urut'=>'required|numeric',
        ],[
            'nama_gudang.required'=>'Nama Gudang harus diisi',
            'nama_gudang.string'=>'Nama Gudang harus teks',
            'no_urut.required'=>'Nomor Urut Gudang harus diisi',
            'no_urut.numeric'=>'Nomor Urut Gudang harus nomor',
            'no_rak.required'=>'Nomor Rak Gudang harus diisi',
            'no_rak.numeric'=>'Nomor Rak Gudang harus nomor',
        ]);
        $gudang = new MGudang([
            'nama_gudang'=>$request->input('nama_gudang'),
            'no_rak'=>$request->input('no_rak'),
            'no_urut'=>$request->input('no_urut'),
        ]);
        if($gudang->save()){
            alert()->success('Data Supplier Berhasil Ditambahkan');
            return redirect()->route('admingudang.kelola.gudang');
        }else{
            alert()->error('Data Supplier Tidak Berhasil Ditambahkan');
            return redirect()->back();
        }
    }
}
