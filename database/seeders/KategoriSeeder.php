<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kategori_id' => 1, 'kategori_kode' => 'EL', 'kategori_nama' => 'Electronics'],
            ['kategori_id' => 2, 'kategori_kode' => 'CL', 'kategori_nama' => 'Clothing'],
            ['kategori_id' => 3, 'kategori_kode' => 'FN', 'kategori_nama' => 'Furniture'],
            ['kategori_id' => 4, 'kategori_kode' => 'BK', 'kategori_nama' => 'Books'],
            ['kategori_id' => 5, 'kategori_kode' => 'TY', 'kategori_nama' => 'Toys'],
        ];
        
        DB::table('m_kategoris')->insert($data);
    }
}
