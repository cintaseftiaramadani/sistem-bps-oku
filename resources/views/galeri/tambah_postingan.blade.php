@extends('layouts.user_type.auth')

@section('content')

<div class="card">
    <div class="card-header text-center">
        <h4>Tambah Postingan Dokumentasi</h4>
    </div>
    <div class="card-body">
        {{-- Notifikasi jika ada error --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form tambah postingan --}}
        <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="caption" class="form-label">Caption Dokumentasi</label>
                <input type="text" name="caption" id="caption" class="form-control" placeholder="Tuliskan caption kegiatan" value="{{ old('caption') }}" required>
            </div>

            <div class="mb-3">
                <label for="path" class="form-label">Foto Dokumentasi</label>
                <input type="file" name="path[]" id="path" class="form-control" accept="image/*" multiple required>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('galeri.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-success">
                    <i class="ni ni-fat-add"></i> Simpan
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
