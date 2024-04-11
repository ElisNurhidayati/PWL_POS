@extends('layouts.app')
{{-- Customize layout sections --}}
@section('subtitle', 'Kategori')
@section('content_header_title', 'Kategori')
@section('content_header_subtitle', 'Update')
{{-- Content body: main page content --}}
@section('content')
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Update Kategori</h3>
            </div>
            <form method="post" action="{{ route('/kategori/update-simpan', $data->kategori_id)}}">
                @csrf
                @method('PUT')
                <div class='card'>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="kodeKategori">Kode Kategori</label>
                            <input type="text" class="form-control" id="kodeKategori" 
                            name="kodeKategori" value="{{$data->kategori_kode}}">
                        </div>
                        <div class="form-group">
                            <label for="namaKategori">Nama Kategori</label>
                            <input type="text" class="form-control" id="namaKategori" 
                            name="namaKategori" value="{{$data->kategori_nama}}">
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href=".../kategori" class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
