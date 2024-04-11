<?php
namespace App\Http\Controllers;

use App\Models\UserModel;
use App\DataTables\UserDataTable;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {
    public function index(UserDataTable $dataTable) {
        return $dataTable->render('user.index');
    }
    public function create() {
        return view('user.create'); 
    }
    public function store(Request $request): RedirectResponse
    {
        UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
            'level_id' => $request->level_id,
        ]);
        return redirect('/user');
    }
    public function update($id) {
        $user = UserModel::find($id);
        return view('user.update', ['data' => $user]);
    }
    public function update_simpan($id, Request $request) {
        $user = UserModel::find($id);

        $user->username = $request->username;
        $user->nama = $request->nama;
        $user->password = Hash::make($request->password);
        $user->level_id = $request->level_id;

        $user->save();
        return redirect('/user');
    }
    public function delete($id) {
        $user = UserModel :: find($id);
        $user->delete();
        return redirect('/user');
    }
}