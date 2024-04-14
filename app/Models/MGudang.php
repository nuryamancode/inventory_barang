<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MGudang extends Model
{
    use HasFactory;
    protected $table = 'data_gudang';
    protected $fillable = [
        'nama_gudang',
        'no_rak',
        'no_urut',
    ];
    protected $casts = [
        'created_at'=> 'datetime',
        'updated_at'=> 'datetime',
    ];
    public function persediaan(){
        return $this->hasOne(MPersediaanBarang::class);
    }
}
