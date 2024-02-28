<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailSeeder extends Seeder {
    public function run(): void
    {
        $data = [
            // Transaction 1
            ['penjualan_id' => 1, 'barang_id' => 1, 'harga' => 3500, 'jumlah' => 1],
            ['penjualan_id' => 1, 'barang_id' => 3, 'harga' => 600, 'jumlah' => 1],
            ['penjualan_id' => 1, 'barang_id' => 5, 'harga' => 300, 'jumlah' => 1], 

            // Transaction 2
            ['penjualan_id' => 2, 'barang_id' => 2, 'harga' => 55, 'jumlah' => 1],
            ['penjualan_id' => 2, 'barang_id' => 4, 'harga' => 40, 'jumlah' => 1],
            ['penjualan_id' => 2, 'barang_id' => 1, 'harga' => 3500, 'jumlah' => 1],

            // Transaction 3
            ['penjualan_id' => 3, 'barang_id' => 5, 'harga' => 300, 'jumlah' => 1],
            ['penjualan_id' => 3, 'barang_id' => 4, 'harga' => 40, 'jumlah' => 1],
            ['penjualan_id' => 3, 'barang_id' => 3, 'harga' => 600, 'jumlah' => 1],

            // Transaction 4
            ['penjualan_id' => 4, 'barang_id' => 2, 'harga' => 55, 'jumlah' => 1],
            [ 'penjualan_id' => 4, 'barang_id' => 6, 'harga' => 2300, 'jumlah' => 1],
            ['penjualan_id' => 4, 'barang_id' => 7, 'harga' => 70, 'jumlah' => 1],

            // Transaction 5
            ['penjualan_id' => 5, 'barang_id' => 9, 'harga' => 60, 'jumlah' => 1],
            ['penjualan_id' => 5, 'barang_id' => 2, 'harga' => 55, 'jumlah' => 1],
            [ 'penjualan_id' => 5, 'barang_id' => 7, 'harga' => 70, 'jumlah' => 1],

            // Transaction 6
            ['penjualan_id' => 6, 'barang_id' => 10, 'harga' => 20, 'jumlah' => 1],
            [ 'penjualan_id' => 6, 'barang_id' => 1, 'harga' => 3500, 'jumlah' => 1],
            ['penjualan_id' => 6, 'barang_id' => 5, 'harga' => 300, 'jumlah' => 1],

            // Transaction 7
            ['penjualan_id' => 7, 'barang_id' => 8, 'harga' => 150, 'jumlah' => 1],
            [ 'penjualan_id' => 7, 'barang_id' => 3, 'harga' => 600, 'jumlah' => 1],
            [ 'penjualan_id' => 7, 'barang_id' => 6, 'harga' => 2300, 'jumlah' => 1],

            // Transaction 8
            [ 'penjualan_id' => 8, 'barang_id' => 9, 'harga' => 60, 'jumlah' => 1],
            [ 'penjualan_id' => 8, 'barang_id' => 1, 'harga' => 3500, 'jumlah' => 1],
            [ 'penjualan_id' => 8, 'barang_id' => 4, 'harga' => 40, 'jumlah' => 1],

            // Transaction 9
            ['penjualan_id' => 9, 'barang_id' => 6, 'harga' => 2300, 'jumlah' => 1],
            [ 'penjualan_id' => 9, 'barang_id' => 10, 'harga' => 20, 'jumlah' => 1],
            [ 'penjualan_id' => 9, 'barang_id' => 2, 'harga' => 55, 'jumlah' => 1],

            // Transaction 10
            ['penjualan_id' => 10, 'barang_id' => 3, 'harga' => 600, 'jumlah' => 1],
            [ 'penjualan_id' => 10, 'barang_id' => 7, 'harga' => 70, 'jumlah' => 1],
            ['penjualan_id' => 10, 'barang_id' => 5, 'harga' => 300, 'jumlah' => 1],
        ];
        DB::table('t_penjualan_details')->insert($data);
    }
}
