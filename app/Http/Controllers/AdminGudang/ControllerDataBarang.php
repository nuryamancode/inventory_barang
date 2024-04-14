<?php

namespace App\Http\Controllers\AdminGudang;

use App\Http\Controllers\Controller;
use App\Models\MBarang;
use App\Models\MGudang;
use App\Models\MPersediaanBarang;
use App\Models\MSupplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ControllerDataBarang extends Controller
{
    public function index()
    {
        $barang = MBarang::all();
        $data = [
            'barang' => $barang,
        ];
        return view('admin.databarang', $data);
    }
    public function tambah()
    {
        $supplier = MSupplier::all();
        $gudang = MGudang::all();
        $data = [
            'gudang' => $gudang,
            'supplier' => $supplier
        ];
        return view('admin.tambah.tambahdatabarang', $data);
    }
    public function simpan(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'spesifikasi' => 'required',
            'foto_barang' => 'required|mimes:png,jpg,jpeg|max:2048',
        ], [
            'nama_barang.required' => 'Nama Barang harus diisi',
            'spesifikasi.required' => 'Berat Barang harus diisi',
            'foto_barang.required' => 'Foto Barang harus diisi',
            'foto_barang.mimes' => 'Format foto harus berupa png,jpg, dan jpeg',
            'foto_barang.max' => 'Ukuran foto maksimal 2mb',
        ]);
        $existskode = MBarang::where('kode_barang', $request->input('kode_barang'))->exists();
        if ($existskode) {
            alert()->error('Kode Barang Sudah ada');
            return redirect()->back();
        }
        $nama_barang =  $request->input('nama_barang');
        $kode_barang =  $request->input('kode_barang');
        $spesifikasi =  $request->input('spesifikasi');
        $supplier_id =  $request->input('supplier_id');
        $gudang_id =  $request->input('gudang_id');
        $stok_barang =  $request->input('stok_barang');
        $harga_jual =  $request->input('harga_jual');
        $status_barang =  $request->input('status_barang');
        if ($request->hasFile('foto_barang')) {
            $file = $request->file('foto_barang');

            if ($file->isValid()) {
                $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
                $path = 'image/foto_barang/' . $fileName;
                $success = file_put_contents(public_path($path), file_get_contents($file));
                if ($success !== false) {
                    $barang = new MBarang([
                        'nama_barang' => $nama_barang,
                        'kode_barang' => $kode_barang,
                        'spesifikasi' => $spesifikasi,
                        'supplier_id' => $supplier_id,
                        'foto_barang' => $path,
                    ]);

                    if ($barang->save()) {
                        $persediaan = new MPersediaanBarang([
                            'barang_id' => $kode_barang,
                            'gudang_id' => $gudang_id,
                            'stok_barang' => $stok_barang,
                            'harga_jual' => $harga_jual,
                            'status_barang' => $status_barang,
                        ]);
                        $persediaan->save();
                        alert()->success('Data Barang Berhasil Ditambahkan');
                        return redirect()->route('admingudang.data.barang');
                    } else {
                        alert()->error('Data Barang Tidak Berhasil Ditambahkan');
                        return redirect()->back();
                    }
                } else {
                    alert()->error('Gagal menyimpan file');
                    return redirect()->back();
                }
            } else {
                alert()->error('File tidak valid');
                return redirect()->back();
            }
        }
    }

    public function detail($id)
    {
        $barang = MBarang::find($id);
        $data = [
            'barang' => $barang
        ];
        return view('admin.barangdetail', $data);
    }

    public function downloadQrCode($kode_barang)
    {
        // Generate QR code dengan URL yang mengarahkan ke detail barang
        $url = route('admingudang.detail.barang', $kode_barang);
        $qrCode = QrCode::size(200)->format('png')->generate($url);

        // Membuat respons dengan tipe konten yang benar
        $response = Response::make($qrCode);

        // Mengatur tipe konten dan header respons
        $response->header('Content-Type', 'image/png');
        $response->header('Content-Disposition', 'attachment; filename="qrcode.png"');

        return $response;
    }
}
