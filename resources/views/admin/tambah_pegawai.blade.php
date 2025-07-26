@extends('layouts.user_type.auth')

@section('content')
<div class="container">
    <h4 class="mb-4">Tambah Data Pegawai</h4>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    
    <form action="{{ route('pegawai.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Nama --}}
        <div class="form-group mb-3">
            <label for="name">Nama</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
        </div>

        {{-- Email --}}
        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
        </div>

        {{-- Password --}}
        <div class="form-group mb-3">
            <label for="password">Kata Sandi</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        {{-- NIP --}}
        <div class="form-group mb-3">
            <label for="nip">NIP</label>
            <input type="text" name="nip" value="{{ old('nip') }}" class="form-control" required>
        </div>

        {{-- Jabatan --}}
        <div class="form-group mb-3">
            <label for="jabatan">Jabatan</label>
            <input type="text" name="jabatan" value="{{ old('jabatan') }}" class="form-control" required>
        </div>

        {{-- Role --}}
        <div class="form-group mb-3">
            <label for="role">Role</label>
            <select name="role" class="form-control" required>
                <option value="">-- Pilih Role --</option>
                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="pegawai" {{ old('role') == 'pegawai' ? 'selected' : '' }}>Pegawai</option>
            </select>
        </div>

        {{-- Foto --}}
        <div class="form-group mb-3">
            <label for="foto">Foto</label>
            <input type="file" name="foto" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('pengelolaan_data_pegawai') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection