<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\BarangController;


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/', [WelcomeController::class, 'index']);

// Modifikasi CRUD user
Route::group(['prefix' => 'user'], function() {
    Route::get('/', [UserController::class, 'index'])->name('user.index');          //Menampilkan halaman awal user
    Route::post('/list', [UserController::class, 'list'])->name('user.list');      //Menampilkan data user dalam bentuk json untuk datatables
    Route::get('/create', [UserController::class, 'create']);   //Menampilkan halaman form tambah user
    Route::post('/', [UserController::class, 'store']);         //Menyimpan data user baru
    Route::get('/{id}', [UserController::class, 'show']);       //Menamilkan detail user
    Route::get('/{id}/edit', [UserController::class, 'edit'])->name('user.edit');  //Menampilkan halaman form edit user
    Route::put('/{id}', [UserController::class, 'update']);     //Menyimpan perubahan data user
    Route::delete('/{id}', [UserController::class, 'destroy']); //Menghapus data user
});

// CRUD level
Route::group(['prefix' => 'level'], function() {
    Route::get('/', [LevelController::class, 'index']);          //Menampilkan halaman awal user
    Route::post('/list', [LevelController::class, 'list']);      //Menampilkan data user dalam bentuk json untuk datatables
    Route::get('/create', [LevelController::class, 'create']);   //Menampilkan halaman form tambah user
    Route::post('/', [LevelController::class, 'store']);         //Menyimpan data user baru
    Route::get('/{id}', [LevelController::class, 'show']);       //Menamilkan detail user
    Route::get('/{id}/edit', [LevelController::class, 'edit']);  //Menampilkan halaman form edit user
    Route::put('/{id}', [LevelController::class, 'update']);     //Menyimpan perubahan data user
    Route::delete('/{id}', [LevelController::class, 'destroy']); //Menghapus data user
});

// CRUD kategori
Route::group(['prefix' => 'kategori'], function() {
    Route::get('/', [KategoriController::class, 'index']);          //Menampilkan halaman awal user
    Route::post('/list', [KategoriController::class, 'list']);      //Menampilkan data user dalam bentuk json untuk datatables
    Route::get('/create', [KategoriController::class, 'create']);   //Menampilkan halaman form tambah user
    Route::post('/', [KategoriController::class, 'store']);         //Menyimpan data user baru
    Route::get('/{id}', [KategoriController::class, 'show']);       //Menamilkan detail user
    Route::get('/{id}/edit', [KategoriController::class, 'edit']);  //Menampilkan halaman form edit user
    Route::put('/{id}', [KategoriController::class, 'update']);     //Menyimpan perubahan data user
    Route::delete('/{id}', [KategoriController::class, 'destroy']); //Menghapus data user
});
// CRUD barang
Route::group(['prefix' => 'barang'], function() {
    Route::get('/', [BarangController::class, 'index']);          //Menampilkan halaman awal user
    Route::post('/list', [BarangController::class, 'list']);      //Menampilkan data user dalam bentuk json untuk datatables
    Route::get('/create', [BarangController::class, 'create']);   //Menampilkan halaman form tambah user
    Route::post('/', [BarangController::class, 'store']);         //Menyimpan data user baru
    Route::get('/{id}', [BarangController::class, 'show']);       //Menamilkan detail user
    Route::get('/{id}/edit', [BarangController::class, 'edit']);  //Menampilkan halaman form edit user
    Route::put('/{id}', [BarangController::class, 'update']);     //Menyimpan perubahan data user
    Route::delete('/{id}', [BarangController::class, 'destroy']); //Menghapus data user
});

//JS 7 Tugas - Stok
Route::group(['prefix' => 'stok'], function () {
    Route::get('/', [StokController::class, 'index']); //menampilkan halaman awal stok
    Route::post('/list', [StokController::class, 'list']); //menampilkan data stok dalam bentuk json untuk database
    Route::get('create', [StokController::class, 'create']); //menampilkan halaman form tambah
    Route::post('/', [StokController::class, 'store']); //menyimpan data stok baru
    Route::get('/{id}', [StokController::class, 'show']); //menampilkan detail stok
    Route::get('/{id}/edit', [StokController::class, 'edit']); //menampilkan halaman form edit stok
    Route::put('/{id}', [StokController::class, 'update']); //menyimpan perubahan data stok
    Route::delete('/{id}', [StokController::class, 'destroy']); //menghapus data stok
});

//JS 7 Tugas - Transaksi
Route::group(['prefix' => 'transaksi'], function () {
    Route::get('/', [TransaksiController::class, 'index']); //menampilkan halaman awal transaksi
    Route::post('/list', [TransaksiController::class, 'list']); //menampilkan data transaksi dalam bentuk json untuk database
    Route::get('create', [TransaksiController::class, 'create']); //menampilkan halaman form tambah transaksi
    Route::post('/', [TransaksiController::class, 'store']); //menyimpan data transaksi baru
    Route::get('/{id}', [TransaksiController::class, 'show']); //menampilkan detail transaksi 
    Route::get('/{id}/edit', [TransaksiController::class, 'edit']); //menampilkan halaman form edit transaksi
    Route::put('/{id}', [TransaksiController::class, 'update']); //menyimpan perubahan data transaksi
    Route::delete('/{id}', [TransaksiController::class, 'destroy']); //menghapus data transaksi
});

// User
// Route::get('/user', [UserController::class, 'index'])->name('/user.index');
// Route::get('/user/create', [UserController::class, 'create'])->name('/user/create');
// Route::post('/user', [UserController::class, 'store'])->name('user');

// Route::get('user/update/{id}', [UserController::class, 'update'])->name('/user/update');
// Route::put('/user/update-simpan/{id}', [UserController::class, 'update_simpan'])->name('/user/update-simpan');
// Route::get('/user/delete/{id}', [UserController::class, 'delete'])->name('/user/delete');

//Kategori
Route::get('/kategori', [KategoriController::class, 'index'])->name('/kategori');

Route::get('/kategori/create', [KategoriController::class, 'create'])->name('/kategori/create');
Route::post('/kategori', [KategoriController::class, 'store']);

Route::get('/kategori/update/{id}', [KategoriController::class, 'update'])->name('/kategori/update');
Route::put('/kategori/update-simpan/{id}', [KategoriController::class, 'update_simpan'])->name('/kategori/update-simpan');
Route::get('/kategori/delete/{id}', [KategoriController::class, 'delete'])->name('/kategori/delete');

//Level
Route::get('/level', [LevelController::class, 'index'])->name('level');
Route::get('/level/create', [LevelController::class, 'create'])->name('/level/create');
Route::post('/level', [LevelController::class, 'store'])->name('/level');

Route::get('/level/update/{id}', [LevelController::class, 'update'])->name('/level/update');
Route::put('/level/update-simpan/{id}', [LevelController::class, 'update_simpan'])->name('/level/update-simpan');
Route::get('/level/delete/{id}', [LevelController::class, 'delete'])->name('/level/delete');

// POSController
Route::resource('m_user', POSController::class);

// Auth
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::post('proses_register', [AuthController::class, 'proses_register'])->name('proses_register');

// kita atur juga untuk middleware menggunakan group pada routing
// didalamnya terdapat group untuk mengecek kondisi login
// jika user yang login merupakan admin maka akan diarahkan ke AdminController
// jika user yang login merupakan manager maka akan diarahkan ke UserController
Route::group(['middleware' => ['auth']], function() {

    Route::group(['middleware' => ['cek_login:1']], function() {
        Route::resource('admin', AdminController::class);
    });
    Route::group(['middleware' => ['cek_login:2']], function() {
        Route::resource('manager', ManagerController::class);
    });
});

// FileUpload
Route::get('/file-upload', [FileUploadController::class,'fileUpload']);
Route::post('/file-upload', [FileUploadController::class,'prosesFileUpload']);
