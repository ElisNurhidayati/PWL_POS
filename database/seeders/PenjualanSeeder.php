<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['penjualan_id' => 1, 'user_id' => 3, 'pembeli' => 'Dini', 'penjualan_kode' => 'ABC', 'penjualan_tanggal' => now()],
            ['penjualan_id' => 2, 'user_id' => 3, 'pembeli' => 'Susi', 'penjualan_kode' => 'BCD', 'penjualan_tanggal' => now()],
            ['penjualan_id' => 3, 'user_id' => 3, 'pembeli' => 'Faiz', 'penjualan_kode' => 'CDE', 'penjualan_tanggal' => now()],
            ['penjualan_id' => 4, 'user_id' => 3, 'pembeli' => 'Ryan', 'penjualan_kode' => 'DEF', 'penjualan_tanggal' => now()],
            ['penjualan_id' => 5, 'user_id' => 3, 'pembeli' => 'Kurnia', 'penjualan_kode' => 'EFG', 'penjualan_tanggal' => now()],
            ['penjualan_id' => 6, 'user_id' => 3, 'pembeli' => 'Dewa', 'penjualan_kode' => 'FGH', 'penjualan_tanggal' => now()],
            ['penjualan_id' => 7, 'user_id' => 3, 'pembeli' => 'Amar', 'penjualan_kode' => 'GHI', 'penjualan_tanggal' => now()],
            ['penjualan_id' => 8, 'user_id' => 3, 'pembeli' => 'Putri', 'penjualan_kode' => 'HIJ', 'penjualan_tanggal' => now()],
            ['penjualan_id' => 9, 'user_id' => 3, 'pembeli' => 'Mada', 'penjualan_kode' => 'IJK', 'penjualan_tanggal' => now()],
            ['penjualan_id' => 10, 'user_id' => 3, 'pembeli' => 'Siti', 'penjualan_kode' => 'JKL', 'penjualan_tanggal' => now()],
        ];
        DB::table('t_penjualans')->insert($data);
    }
}
