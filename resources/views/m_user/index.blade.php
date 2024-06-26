@extends('layouts.app')
@section('subtitle', 'M_User')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'CRUD User')
@section('content')
<div class="card card-secondary">
    <div class="card-header bg-light">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="float-left">
                    <h1 style="font-size: 1.5rem;">CRUD User</h1>
                </div>
                <div class="float-right">
                    <a class="btn btn-primary" href="{{ route('m_user.create') }}">Input User</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card-body">
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
    <tr>
        <th width="20px" class="text-center">User id</th>
        <th width="150px" class="text-center">Level id</th>
        <th width="200px"class="text-center">Username</th>
        <th width="200px"class="text-center">Nama</th>
        <th width="150px"class="text-center">Password</th>
        <th width="300px"class="text-center">Actions</th>
    </tr>
@foreach ($useri as $m_user)
    <tr>
        <td>{{ $m_user->user_id }}</td>
        <td>{{ $m_user->level_id }}</td>
        <td>{{ $m_user->username }}</td>
        <td>{{ $m_user->nama }}</td>
        <td>{{ $m_user->password }}</td>
        <td class="text-center">
            <form action="{{ route('m_user.destroy',$m_user->user_id) }}" method="POST">
                <a class="btn btn-info btn-sm" href="{{ route('m_user.show', $m_user->user_id) }}">Show</a>
                <a class="btn btn-primary btn-sm" href="{{ route('m_user.edit', $m_user->user_id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
            </form>
        </td>
</tr>
@endforeach
</table>
@endsection
