<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $user = UserModel::findOr(20, ['usename', 'nama'], function() {
            abort(404);
        });
        return view('user', ['data' => $user]);
    }
}

// $data = [
//     'level_id' => 2,
//     'username' => 'manager_tiga',
//     'nama' => 'Manager 3',
//     'password' => Hash::make('12345')
// ];
// UserModel::create($data); //tambah data  m_users

// //Akses model UserModel
// $user = UserModel::all();  //Mengambil semua data tabel m_users
// return view('user', ['data' => $user]);