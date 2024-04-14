<?php

namespace App\Http\Controllers\AdminGudang;

use App\Http\Controllers\Controller;
use App\Models\MSupplier;
use Illuminate\Http\Request;

class ControllerKelolaSupplier extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supplier = MSupplier::all();
        $data = [
            'supplier'=>$supplier,
        ];
        return view('admin.kelolasupplier', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function tambah()
    {
        return view('admin.tambah.tambahsupplier');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function simpan(Request $request)
    {
        $request->validate([
            'nama_supplier'=>'required|string',
            'alamat'=>'required',
            'nomor_hp'=>'required|numeric',
            'email'=>'required|email',
        ],[
            'nama_supplier.required'=>'Nama Supplier harus diisi',
            'nama_supplier.string'=>'Nama Supplier harus teks',
            'alamat.required'=>'Alamat Supplier harus diisi',
            'nomor_hp.required'=>'Nomor HP Supplier harus diisi',
            'email.required'=>'Email Supplier harus diisi',
            'nomor_hp.numeric'=>'Nomor HP Supplier harus nomor',
            'email.email'=>'Email Supplier harus valid',
        ]);
        $supplier = new MSupplier([
            'nama_supplier'=>$request->input('nama_supplier'),
            'alamat'=>$request->input('alamat'),
            'nomor_hp'=>$request->input('nomor_hp'),
            'email'=>$request->input('email'),
        ]);
        if($supplier->save()){
            alert()->success('Data Supplier Berhasil Ditambahkan');
            return redirect()->route('admingudang.kelola.supplier');
        }else{
            alert()->error('Data Supplier Tidak Berhasil Ditambahkan');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
