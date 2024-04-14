<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminGudang extends Model
{
    use HasFactory;
    protected $table = 'admingudang';
    protected $fillable = [
        'nama',
        'tanggal_lahir',
        'alamat',
        'no_handphone',
        'user_id',
        'foto_profil',
    ];
    protected $casts = [
        'created_at'=> 'datetime',
        'updated_at'=> 'datetime',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
