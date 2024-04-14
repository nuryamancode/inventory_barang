<?php

namespace App\Http\Controllers\AdminGudang;

use App\Http\Controllers\Controller;
use App\Models\MBarangKeluar;
use App\Models\MBarangMasuk;
use App\Models\MPersediaanBarang;
use Illuminate\Http\Request;

class ControllerBarangKeluar extends Controller
{
    public function index()
    {
        $barang_keluar = MBarangKeluar::all();
        $data = [
            'barang_keluar' => $barang_keluar,
        ];
        return view("admin.barangkeluar", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function tambah()
    {
        $persediaan = MBarangMasuk::orderByDesc('created_at')->first();
        $barang = MPersediaanBarang::where('status_barang', 'Tersedia')->get();
        $data = [
            'barang' => $barang,
        ];
        return view("admin.tambah.tambahbarangkeluar", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function simpan(Request $request)
    {
        $request->validate([
            'jumlah_barang' => 'required',
            // 'harga_beli' => 'required',
        ], [
            'jumlah_barang.required' => 'Jumlah barang harus diisi',
            // 'harga_beli.required' => 'Harga beli harus diisi',
        ]);
        $persediaan_id = $request->input('persediaan_id');
        $jumlah_barang = $request->input('jumlah_barang');
        // $harga_beli = $request->input('harga_beli');
        $barangkeluar = new MBarangKeluar([
            'jumlah_barang' => $jumlah_barang,
            // 'harga_beli' => $harga_beli,
            'persediaan_id' => $persediaan_id,
        ]);
        if ($barangkeluar->save()) {
            // $barangmasuk = MBarangMasuk::find($barang_masuk_id);
            // $persediaan_id = $barangmasuk->persediaan_id;
            $stok = MPersediaanBarang::find($persediaan_id);
            $stok->stok_barang -= $jumlah_barang;
            $stok->save();
            alert()->success('Barang Masuk Berhasil Ditambahkan');
            return redirect()->route('admingudang.barang.keluar');
        } else {
            alert()->error('Barang Masuk Tidak Berhasil Ditambahkan');
            return redirect()->route('admingudang.barang.keluar');
        }
    }
}
