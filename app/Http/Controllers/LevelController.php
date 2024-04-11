<?php

namespace App\Http\Controllers;

use App\DataTables\LevelDataTable;
use App\Models\LevelModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Monolog\Level;

class LevelController extends Controller
{
    public function index(LevelDataTable $dataTable) {
        return $dataTable->render('level.index');
    }
    public function create() {
        return view('level.create');
    } 
    public function store(Request $request) : RedirectResponse
    {
        LevelModel::create([
            'level_kode' => $request->level_kode,
            'level_nama' => $request->level_nama,
        ]);
        return redirect('/level');
    }
    public function update($id)
    {
        $level = LevelModel::find($id);
        return view('level.update', ['data' => $level]);
    }
    public function update_simpan($id, Request $request)
    {
        $level = LevelModel::find($id);
        $level->level_kode = $request->level_kode;
        $level->level_nama = $request->level_nama;
        $level->save();
        return redirect('/level');
    }
    public function delete($id)
    {
        $user = LevelModel::find($id);
        $user->delete();
        return redirect('/level');
    }
}




// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;

// class LevelController extends Controller
// {
//     public function index()
//     {
//         DB::insert('insert into m_levels(level_kode, level_nama, created_at) values(?, ?, ?)', ['CUS', 'Pelanggan', now()]);
//         return 'Insert data baru berhasil';

//         $row = DB::update('update m_levels set level_nama = ? where level_kode = ?', ['Customer', 'CUS']);
//         return 'Update data berhasil. Jumlah data ynag diupdate: '.$row.' baris';

//         $row = DB::delete('delete from m_levels where level_kode = ?', ['CUS']);
//         return 'Delete data berhasil. Jumlah data yang dihapus: '.$row.' baris';

//         $data = DB::select('select * from m_levels');
//         return view('level', ['data' => $data]);
//     }
    
// }
