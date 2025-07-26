@extends('layouts.user_type.auth')

@section('content')

<div class="position-relative mt-0 mb-0">
    {{-- Tombol kembali --}}
    <a href="{{ route('galeri.index') }}" class="btn p-2 mb-1" style="color: gray; font-size: 1.5rem;">
        <i class="fas fa-arrow-left"></i>
    </a>

    <div class="card shadow-lg rounded-0 p-4 mb-4" style="background-color: #f8f9fa;">
        <div class="row align-items-center">
            <div class="col-md-6 text-center">
                <div id="carouselDetail" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner rounded-4 shadow">
                        @foreach ($galeri->paths as $index => $path)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <img src="{{ asset('storage/' . $path) }}" class="d-block w-100 rounded-4" style="object-fit: contain; max-height: 450px;">
                            </div>
                        @endforeach
                    </div>

                    @if(count($galeri->paths) > 1)
                    {{-- Panah kiri --}}
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselDetail" data-bs-slide="prev" style="width: 35px;">
                        <span aria-hidden="true" style="color: rgba(85, 85, 85, 0.9); font-size: 1.2rem;">
                            <i class="fas fa-chevron-left"></i>
                        </span>
                        <span class="visually-hidden">Previous</span>
                    </button>

                    {{-- Panah kanan --}}
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselDetail" data-bs-slide="next" style="width: 35px;">
                        <span aria-hidden="true" style="color: rgba(85, 85, 85, 0.9); font-size: 1.2rem;">
                            <i class="fas fa-chevron-right"></i>
                        </span>
                        <span class="visually-hidden">Next</span>
                    </button>


                        {{-- Indicator bulat --}}
                        <div class="carousel-indicators mt-2">
                            @foreach ($galeri->paths as $index => $path)
                                <button type="button" data-bs-target="#carouselDetail" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}" aria-current="true" aria-label="Slide {{ $index + 1 }}" style="width: 10px; height: 10px; border-radius: 50%; background-color: #555;"></button>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-md-6 text-start d-flex flex-column justify-content-between" style="height: 100%;">
                <div>
                    <h4 class="fw-bold" style="margin-top: 0;">{{ $galeri->caption }}</h4>
                    <p class="text-muted mb-1">Tanggal posting : {{ $galeri->created_at->format('d F Y') }}</p>
                </div>

                <div class="d-flex gap-3 align-items-end mt-4">
                    <form action="{{ route('galeri.destroy', $galeri->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus postingan ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn p-2" style="color: red; font-size: 1.5rem;">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>

                    <a href="{{ asset('storage/' . $galeri->paths[0]) }}" download class="btn p-2" style="color: green; font-size: 1.5rem;">
                        <i class="fas fa-download"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
