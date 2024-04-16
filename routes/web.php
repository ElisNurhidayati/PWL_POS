<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;

Route::get('/', [WelcomeController::class, 'index']);

Route::group(['prefix' => 'user'], function() {
    Route::get('/', [UserController::class, 'index'])->name('user.index');          //Menampilkan halaman awal user
    Route::post('/list', [UserController::class, 'list'])->name('user.list');      //Menampilkan data user dalam bentuk json untuk datatables
    Route::get('/create', [UserController::class, 'create']);   //Menampilkan halaman form tambah user
    Route::post('/', [UserController::class, 'store']);         //Menyimpan data user baru
    Route::get('/{id}', [UserController::class, 'show']);       //Menamilkan detail user
    Route::get('/{id}/edit', [UserController::class, 'edit']);  //Menampilkan halaman form edit user
    Route::put('/{id}', [UserController::class, 'update']);     //Menyimpan perubahan data user
    Route::delete('/{id}', [UserController::class, 'destroy']); //Menghapus data user
});

// use App\Http\Controllers\LevelController;
// use App\Http\Controllers\KategoriController;
// use App\Http\Controllers\POSController;

// Route::resource('m_user', POSController::class);

//User
// Route::get('/user', [UserController::class, 'index'])->name('/user');
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

