<?php

namespace App\Http\Controllers\AdminGudang;

use App\Http\Controllers\Controller;
use App\Models\MBarang;
use App\Models\MBarangMasuk;
use App\Models\MPersediaanBarang;
use Illuminate\Http\Request;

class ControllerBarangMasuk extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang_masuk = MBarangMasuk::all();
        $data = [
            'barang_masuk' => $barang_masuk,
        ];
        return view("admin.barangmasuk", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function tambah()
    {
        $persediaan = MPersediaanBarang::all();
        $data_barang = MBarang::all();
        $data = [
            'persediaan' => $persediaan,
            'data_barang' => $data_barang,
        ];
        return view("admin.tambah.tambahbarangmasuk", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function simpan(Request $request)
    {
        $request->validate([
            'jumlah_barang' => 'required',
            'harga_beli' => 'required',
        ], [
            'jumlah_barang.required' => 'Jumlah barang harus diisi',
            'harga_beli.required' => 'Harga beli harus diisi',
            'barang_id.required' => 'Barang harus dipilih',
        ]);

        $barang_id = $request->input('barang_id');
        $persediaan_id = $request->input('persediaan_id');
        $jumlah_barang = $request->input('jumlah_barang');
        $harga_beli = $request->input('harga_beli');

        $persediaanada = MPersediaanBarang::find($persediaan_id);

        if (!$persediaanada) {
            $persediaanada = MPersediaanBarang::create([
                'barang_id' => $barang_id,
                'stok_barang' => $jumlah_barang,
            ]);
        } else {
            $jumlah_barang_baru = $persediaanada->stok_barang + $jumlah_barang;
            if ($jumlah_barang_baru > 500) {
                alert()->error('Stok barang telah mencapai batas maksimal.');
                return redirect()->route('admingudang.barang.masuk');
            }
            $persediaanada->stok_barang = $jumlah_barang_baru;
            $persediaanada->save();
        }
        $barangmasuk = new MBarangMasuk([
            'jumlah_barang' => $jumlah_barang,
            'harga_beli' => $harga_beli,
            'persediaan_id' => $persediaanada->id,
        ]);
        if ($barangmasuk->save()) {
            alert()->success('Barang Masuk Berhasil Ditambahkan');
        } else {
            alert()->error('Barang Masuk Tidak Berhasil Ditambahkan');
        }
        return redirect()->route('admingudang.barang.masuk');
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
