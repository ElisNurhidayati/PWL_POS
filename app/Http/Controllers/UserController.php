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
        $user = UserModel::create([
                'username' => 'manager11',
                'nama' => 'Manager11',
                'password' => Hash::make('12345'),
                'level_id' => 2,
            ]);

        $user->username = 'manager12';

        $user->save();

        $user->wasChanged(); //true
        $user->wasChanged('username'); //true
        $user->wasChanged(['username', 'level_id']); //true
        $user->wasChanged('nama'); //false
        dd($user->wasChanged(['nama', 'username'])); //true

    }
}


// $user = UserModel::create([
//     'username' => 'manager55',
//     'nama' => 'Manager55',
//     'password' => Hash::make('12345'),
//     'level_id' => 2,
// ]);

// $user->username = 'manager56';

// $user->isDirty(); //true
// $user->isDirty('username'); //true
// $user->isDirty('nama'); //false
// $user->isDirty(['nama', 'username']); //true

// $user->isClean(); //flase
// $user->isClean('username'); //false
// $user->isClean('nama'); //true
// $user->isClean('nama', 'username'); //false
// $user->save();
// $user->isDirty(); //false
// $user->isClean(); //true
// dd($user->isDirty());


// $user = UserModel::firstOrNew([
//     'username' => 'manager33',
//     'nama' => 'Manager Tiga Tiga',
//     'password' => Hash::make('12345'),
//     'level_id' => 2
// ],
// );
// $user->save();
// return view('user', ['data' => $user]);

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