<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MSupplier extends Model
{
    use HasFactory;
    protected $table = 'data_supplier';
    protected $fillable = [
        'nama_supplier',
        'nomor_hp',
        'alamat',
        'email',
    ];
    protected $casts = [
        'created_at'=> 'datetime',
        'updated_at'=> 'datetime',
    ];
    public function barang(){
        return $this->hasOne(MBarang::class);
    }
}
