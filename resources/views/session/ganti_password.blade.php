@extends('layouts.user_type.auth')

@section('content')
<div class="container mt-4">
    <h4 class="mb-3">Ganti Password</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <div class="mb-3">
            <label>Kata Sandi Lama</label>
            <input type="password" name="old_password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Kata Sandi Baru</label>
            <input type="password" name="new_password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Konfirmasi Kata Sandi Baru</label>
            <input type="password" name="new_password_confirmation" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Kata Sandi Baru</button>
    </form>
</div>
@endsection
