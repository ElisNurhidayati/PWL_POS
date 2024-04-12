<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use App\DataTables\KategoriDataTable;
use App\Models\KategoriModel;
use App\Http\Requests\StorePostRequest;

class KategoriController extends Controller
{
    public function index(KategoriDataTable $dataTable)
    {
        return $dataTable->render('kategori.index');
    }
    public function create()
    {
        return view('kategori.create');
    }

    public function store(StorePostRequest $request)
    {
        $validated=$request->validated();
            $validated = $request->safe()->only(['kategori_kode', 'kategori_nama']);
            $validated = $request->safe()->except(['kategori_kode', 'kategori_nama']);

        KategoriModel::create([
                'kategori_kode' => $request->kodeKategori,
                'kategori_nama' => $request->namaKategori,
        ]);
        return redirect('/kategori');
    }
    public function update($id)
    {
        $kategori = KategoriModel::find($id);
        return view('kategori.update', ['data' => $kategori]);
    }

    public function update_simpan($id, Request $request)
    {
        $kategori = KategoriModel::find($id);
        $kategori->kategori_kode = $request->kodeKategori;
        $kategori->kategori_nama = $request->namaKategori;

        $kategori->save();
        return redirect('/kategori');
    }

    public function delete($id)
    {
        $kategori = KategoriModel::find($id);

        $kategori->delete();
        return redirect('/kategori');
    }
}

// $validated=$request->validate([
// KategoriModel::create([

    // $request->validate([
    //     'kategori_kode' => 'bail|required|string|max:255',
    //     'kategori_nama' => 'bail|required|string|max:255',
    // ]);
    //     KategoriModel::create([
    //     'kategori_kode' => $request->kodeKategori,
    //     'kategori_nama' => $request->namaKategori,
    // ]);