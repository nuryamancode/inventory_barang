<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AdminGudang;
use App\Models\MGudang;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'username'=>'admingudang',
            'password'=>bcrypt('admin123'),
            'peran'=>'Admin',
        ]);
        // User::create([
        //     'username'=>'staffpenjualan',
        //     'password'=>bcrypt('staffpenjualan'),
        //     'peran'=>'Penjualan',
        // ]);
        // User::create([
        //     'username'=>'managergudang',
        //     'password'=>bcrypt('managergudang'),
        //     'peran'=>'Manager',
        // ]);
        AdminGudang::create([
            'user_id'=>1,
            'nama'=>'Naufal Shabir'
        ]);

        MGudang::create([
            'nama_gudang'=> 'Gudang 1',
            'no_rak'=> 3,
            'no_urut'=> 4,
        ]);
        MGudang::create([
            'nama_gudang'=> 'Gudang 1',
            'no_rak'=> 4,
            'no_urut'=> 5,
        ]);
        MGudang::create([
            'nama_gudang'=> 'Gudang 2',
            'no_rak'=> 2,
            'no_urut'=> 3,
        ]);
        MGudang::create([
            'nama_gudang'=> 'Gudang 3',
            'no_rak'=> 6,
            'no_urut'=> 10,
        ]);
    }
}
