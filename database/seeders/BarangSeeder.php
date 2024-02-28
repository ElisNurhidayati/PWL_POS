<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['barang_id' => 1, 'kategori_id' => 1, 'barang_kode' => 'EL1', 'barang_nama' => 'Laptop', 'harga_beli' => 2000, 'harga_jual' => 3500],
            ['barang_id' => 2, 'kategori_id' => 2, 'barang_kode' => 'CL1', 'barang_nama' => 'T-shirt', 'harga_beli' => 40, 'harga_jual' => 55],
            ['barang_id' => 3, 'kategori_id' => 3, 'barang_kode' => 'FN1', 'barang_nama' => 'Sofa', 'harga_beli' => 450, 'harga_jual' => 600],
            ['barang_id' => 4, 'kategori_id' => 4, 'barang_kode' => 'BK1', 'barang_nama' => 'Novel', 'harga_beli' => 30, 'harga_jual' => 40],
            ['barang_id' => 5, 'kategori_id' => 5, 'barang_kode' => 'TY1', 'barang_nama' => 'Action Figure', 'harga_beli' => 200, 'harga_jual' => 300],
            ['barang_id' => 6, 'kategori_id' => 1, 'barang_kode' => 'EL2', 'barang_nama' => 'Smartphone', 'harga_beli' => 1500, 'harga_jual' => 2300],
            ['barang_id' => 7, 'kategori_id' => 2, 'barang_kode' => 'CL2', 'barang_nama' => 'Jeans', 'harga_beli' => 60, 'harga_jual' => 70],
            ['barang_id' => 8, 'kategori_id' => 3, 'barang_kode' => 'FN2', 'barang_nama' => 'Coffee Table', 'harga_beli' => 100, 'harga_jual' => 150],
            ['barang_id' => 9, 'kategori_id' => 4, 'barang_kode' => 'BK2', 'barang_nama' => 'Dictionary', 'harga_beli' => 45, 'harga_jual' => 60],
            ['barang_id' => 10, 'kategori_id' => 5, 'barang_kode' => 'TY2', 'barang_nama' => 'Squishy', 'harga_beli' => 15, 'harga_jual' => 20],
        ];
        
        DB::table('m_barangs')->insert($data);
    }
}

