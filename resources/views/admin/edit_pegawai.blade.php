@extends('layouts.user_type.auth')

@section('content')
<div class="container">
    <h3 class="font-weight-bolder mb-4">Edit Data Pegawai</h3>

    <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Nama --}}
        <div class="form-group mb-3">
            <label for="name">Nama</label>
            <input type="text" name="name" value="{{ old('name', $pegawai->name) }}" class="form-control" required>
        </div>

        {{-- Email --}}
        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" value="{{ old('email', $pegawai->email) }}" class="form-control" required>
        </div>


        {{-- NIP --}}
        <div class="form-group mb-3">
            <label for="nip">NIP</label>
            <input type="text" name="nip" value="{{ old('nip', $pegawai->nip) }}" class="form-control" required>
        </div>

        {{-- Jabatan --}}
        <div class="form-group mb-3">
            <label for="jabatan">Jabatan</label>
            <input type="text" name="jabatan" value="{{ old('jabatan', $pegawai->jabatan) }}" class="form-control" required>
        </div>

        {{-- Password (jika ingin ganti) --}}
        <div class="form-group mb-3">
            <label for="password">Kata Sandi <small>(Isi jika ingin mengganti)</small></label>
            <input type="password" name="password" class="form-control">
        </div>

        {{-- Role --}}
        <div class="form-group mb-3">
            <label for="role">Role</label>
            <select name="role" class="form-control" required>
                <option value="admin" {{ $pegawai->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="pegawai" {{ $pegawai->role == 'pegawai' ? 'selected' : '' }}>Pegawai</option>
            </select>
        </div>

        {{-- Foto --}}
        <div class="form-group mb-3">
            <label for="foto">Foto <small>(Upload jika ingin mengganti)</small></label>
            <input type="file" name="foto" class="form-control-file">
            @if($pegawai->foto)
                <small class="d-block mt-1">Foto saat ini:</small>
                <img src="{{ asset('storage/fotos/' . $pegawai->foto) }}" alt="Foto Pegawai" width="120" class="mt-2">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('pengelolaan_data_pegawai') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
