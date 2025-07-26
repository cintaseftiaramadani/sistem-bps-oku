@extends('layouts.user_type.auth')

@section('content')

<div class="card text-center mb-4">
    <div class="card-body">
        <h3 class="mb-0">
            Galeri Badan Pusat Statistik Kabupaten Ogan Komering Ulu
        </h3>
    </div>
</div>

<div class="d-flex justify-content-start mb-0">
    <a href="{{ route('galeri.create') }}" class="btn btn-success">
        <i class="ni ni-fat-add"></i> Tambah Postingan
    </a>
</div>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3">
  @forelse ($galeris as $galeri)
    <div class="col">
      <div class="card shadow-sm rounded-4 p-2 position-relative bg-white">
        <a href="{{ route('galeri.show', $galeri->id) }}">
          @if($galeri->paths && count($galeri->paths) > 0)
            <img src="{{ asset('storage/'.$galeri->paths[0]) }}" class="card-img-top rounded-3" style="object-fit: cover; height: 200px;">
            @if(count($galeri->paths) > 1)
              <span class="position-absolute top-2 end-2 m-2 px-2 py-1 rounded-3 bg-dark bg-opacity-15 text-white small">
                  {{ count($galeri->paths) }} foto
              </span>
            @endif
          @else
            <img src="{{ asset('default-image.jpg') }}" class="card-img-top rounded-3" style="object-fit: cover; height: 200px;">
          @endif
        </a>
        <div class="d-flex justify-content-between align-items-center mt-2 px-1">
        <p class="mb-0 small text-muted fw-bold text-truncate" style="max-width: 150px;">
            {{ $galeri->caption }}
        </p>
        <div class="dropdown">
            <a class="text-muted" href="#" role="button" id="dropdownMenuLink{{ $galeri->id }}" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-ellipsis-h"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink{{ $galeri->id }}">
            <li>
                <form action="{{ route('galeri.destroy', $galeri->id) }}" method="POST" onsubmit="return confirm('Apakah yakin ingin menghapus postingan ini?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="dropdown-item text-danger">
                    <i class="fas fa-trash-alt me-2"></i>Hapus
                </button>
                </form>
            </li>
            <li>
                <a href="{{ asset('storage/'.$galeri->paths[0]) }}" download class="dropdown-item">
                <i class="fas fa-download me-2"></i>Download
                </a>
            </li>
            </ul>
        </div>
        </div>
      </div>
    </div>
  @empty
    <p class="text-center">Belum ada postingan dokumentasi.</p>
  @endforelse
</div>

@endsection
