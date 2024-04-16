<?php
namespace App\Http\Controllers;

use App\Models\LevelModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller {
    //Menampilkan halaman awal user
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar User',
            'list'  => ['Home', 'User']
        ];

        $page = (object) [
            'title' => 'Daftar user yang terdaftar dalam sistem'
        ];

        $activeMenu = 'user'; //set menu yang sedang aktif

        return view('user.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }

    // Ambil data user dalam bentuk json untuk datatables 
    public function list(Request $request) 
    {
        $users = UserModel::select('user_id', 'username', 'nama', 'level_id') 
                ->with('level'); 
        return DataTables::of($users) 
            ->addIndexColumn() // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex) 
            ->addColumn('aksi', function ($user) {  // menambahkan kolom aksi
                $btn  = '<a href="'.url('user' . $user->user_id).'" class="btn btn-info btn-sm">Detail</a> '; 
                $btn .= '<a href="'.url('user' . $user->user_id . '/edit').'" class="btn btn-warning btn-sm">Edit</a> '; 
                $btn .= '<form class="d-inline-block" method="POST" action="'. url('/user/'.$user->user_id).'">' 
                    . csrf_field() . method_field('DELETE') .  
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button>
                    </form>';
                    return $btn; 
        }) 
        ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html 
        ->make(true); 
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah User',
            'list'  => ['Home', 'User', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah User Baru'
        ];

        $level = LevelModel::all(); //Ambil data level untuk ditampilkan di form
        $activeMenu = 'user'; //set menu yang sedang aktif

        return view('user.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' =>$level, 'activeMenu' => $activeMenu]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|min:3|unique:m_user,username',
            'nama' => 'required|string|max:100',
            'password' => 'required|min:5',
            'level_id' => 'required|integer'
        ]);
            
        UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => bcrypt($request->password),
            'level_id' => $request->level_id,
        ]);
        return redirect('/user')->with('success', 'Data user berhasil disimpan');
    }

    public function show(String $id)
    {
        $user = UserModel::find($id);
        $breadcrumb = (object) [
            'title' => 'Detail User',
            'list'  => ['Home', 'User', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail User'
        ];

        $activeMenu = 'user'; //set menu yang sedang aktif

        return view('user.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' =>$user, 'activeMenu' => $activeMenu]);
    }

    public function edit($id)
    {
        $user = UserModel::find($id);
        $level = LevelModel::all();

        $breadcrumb = (object) [
            'title' => 'Edit User',
            'list'  => ['Home', 'User', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit User'
        ];

        $activeMenu = 'user'; //set menu yang sedang aktif

        return view('user.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'level' => $level, 'activeMenu' => $activeMenu]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            //Username harus diisi, berupa string, minimal 3 karakter
            //dan bernilai unik didalam tabel m_user kolom username kecuali untuk user dengan id yang sedang diedit
            'username' => 'required|string|min:3|unique:m_user,username, '.$id.', user_id',
            'nama' => 'required|string|max:100',
            'password' => 'required|min:5',
            'level_id' => 'required|integer'
        ]);
            
        UserModel::find($id)->update([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => $request->password ? bcrypt($request->password) : UserModel::find($id)->password, //password dienkripsi jika diisi
            'level_id' => $request->level_id,
        ]);
        return redirect('/user')->with('success', 'Data user berhasil disimpan');
    }

    public function destroy(String $id)
    {
        $check = UserModel::find($id);
        if (!$check) {  //untuk mengecek apakah data user dengan id yang dimaksud ada atau tidak
            return redirect ('/user')->with ('error', 'Data user tidak ditemukan');
        }

        try {
            UserModel::destroy($id);  //menghapus data user
            return redirect ('/user')->with ('success', 'Data user berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            //jika terjadi error ketika menghapus data, redirect kembali ke halaman user dengan membawa pesan error
            return redirect ('/user')->with ('error', 'Data user gagal dihapus: ' + thrown);
        }
    }
}

// use Illuminate\Http\RedirectResponse;
// use Illuminate\Contracts\View\View;
// use App\DataTables\UserDataTable;
// use App\Http\Requests\StorePostRequest;
// use Illuminate\Support\Facades\Hash;
    // public function index(UserDataTable $dataTable) {
    //     return $dataTable->render('user.index');
    // }
    // public function create() {
    //     return view('user.create'); 
    // }
    // public function store(StorePostRequest $request)
    // {
    //     $validated = $request->validated();
    //         $validated = $request->safe()->only(['username', 'nama', 'password', 'level_id']);
    //         $validated = $request->safe()->except(['username', 'nama', 'password', 'level_id']);

    //     UserModel::create([
    //         'username' => $request->username,
    //         'nama' => $request->nama,
    //         'password' => Hash::make($request->password),
    //         'level_id' => $request->level_id,
    //     ]);
    //     return redirect('/user');
    // }
    // public function update($id) {
    //     $user = UserModel::find($id);
    //     return view('user.update', ['data' => $user]);
    // }
    // public function update_simpan($id, Request $request) {
    //     $user = UserModel::find($id);

    //     $user->username = $request->username;
    //     $user->nama = $request->nama;
    //     $user->password = Hash::make($request->password);
    //     $user->level_id = $request->level_id;

    //     $user->save();
    //     return redirect('/user');
    // }
    // public function delete($id) {
    //     $user = UserModel :: find($id);
    //     $user->delete();
    //     return redirect('/user');
    // }

