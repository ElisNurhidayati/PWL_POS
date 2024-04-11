<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\UserController;
use App\Models\UserModel;

Route::get('/', function () {
    return view('welcome');
});


//User
Route::get('/user', [UserController::class, 'index'])->name('/user');
Route::get('/user/create', [UserController::class, 'create'])->name('/user/create');
Route::post('/user', [UserController::class, 'store'])->name('user');

Route::get('user/update/{id}', [UserController::class, 'update'])->name('/user/update');
Route::put('/user/update-simpan/{id}', [UserController::class, 'update_simpan'])->name('/user/update-simpan');
Route::get('/user/delete/{id}', [UserController::class, 'delete'])->name('/user/delete');

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

