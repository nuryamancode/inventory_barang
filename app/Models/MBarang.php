<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MBarang extends Model
{
    use HasFactory;
    protected $table = 'data_barang';
    protected $primaryKey  = 'kode_barang';
    protected $fillable = [
        'nama_barang',
        'kode_barang',
        'foto_barang',
        'spesifikasi',
        'supplier_id',
    ];
    protected $casts = [
        'created_at'=> 'datetime',
        'updated_at'=> 'datetime',
    ];
    public $incrementing = false;

    public function supplier(){
        return $this->belongsTo(MSupplier::class);
    }
    public function persediaan(){
        return $this->hasOne(MPersediaanBarang::class, 'barang_id');
    }
}
