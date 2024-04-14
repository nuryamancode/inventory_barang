<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MPersediaanBarang extends Model
{
    use HasFactory;
    protected $table = 'persediaan_barang';
    protected $fillable = [
        'stok_barang',
        'nama_gudang',
        'no_urut',
        'no_rak',
        'harga_jual',
        'status_barang',
        'barang_id',
        'gudang_id',
    ];
    protected $casts = [
        'created_at'=> 'datetime',
        'updated_at'=> 'datetime',
    ];
    public function barang(){
        return $this->belongsTo(MBarang::class, 'barang_id');
    }
    public function gudang(){
        return $this->belongsTo(MGudang::class);
    }
    public function barangmasuk(){
        return $this->hasOne(MBarangMasuk::class, 'persediaan_id');
    }
    public function barangkelauar(){
        return $this->hasOne(MBarangKeluar::class);
    }
}
