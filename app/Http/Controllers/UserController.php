<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class UserController extends Controller
{
    public function index()
    {
        $user = UserModel::firstOrNew([
                'username' => 'manager33',
                'nama' => 'Manager Tiga Tiga',
                'password' => Hash::make('12345'),
                'level_id' => 2
            ],
        );
        $user->save();
        return view('user', ['data' => $user]);
    }
}

// $user = UserModel::firstOrCreate([
//     'username' => 'manager22',
//     'nama' => 'Manager Dua Dua',
// ],
// );
// return view('user', ['data' => $user]);


// $user = UserModel::firstOrCreate([
//     'username' => 'manager22',
//     'nama' => 'Manager Dua Dua',
//     'password' => Hash::make('12345'),
//     'level_id' => 2
// ],
// );
// return view('user', ['data' => $user]);

// $user = UserModel::where('level_id', 2)->count();
// dd($user);
// return view('user', ['data' => $user]);


// $user = UserModel::where('username', 'manager9')->firstOrFail();
        // return view('user', ['data' => $user]);


// $user = UserModel::fidOrFail(20, ['usename', 'nama'], function() {
//     abort(404);
// });
// return view('user', ['data' => $user]);


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