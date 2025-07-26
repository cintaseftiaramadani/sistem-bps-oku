@extends('layouts.user_type.auth')

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"></>
    <style>
    .small-italic {
        font-size: 12px;
        font-style: italic;
        color: #6b7280;
    }
    </style>
@endpush

@section('content')

    {{-- Tombol kembali --}}
    <a href="{{ route('menu_triwulan') }}" class="btn p-2 mb-1" style="color: gray; font-size: 1.5rem;">
        <i class="fas fa-arrow-left"></i>
    </a>

    <div class="row mt-2">
        <div class="col-lg-12 mb-2">
            <div class="card">
                <div class="card-body p-1">
                    <div class="d-flex flex-column">
                        <p class="font-weight-bolder my-2 text-center mb-2" style="font-size: 25px;">
                            PENILAIAN KINERJA PEGAWAI - TRIWULAN 2 TAHUN {{ date('Y') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>   

    <div class="row mt-2">
        <div class="col-lg-12 mb-3">
            <div class="card">
                <div class="card-body p-1">
                    <div class="d-flex flex-column">
                        <p class="big-italic my-2 mb-2 text-center">
                            Silakan pilih rekan kerja yang akan Anda nilai. Penilaian bersifat rahasia dan bertujuan untuk pengembangan kinerja tim.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>   

    @foreach($pegawaiLain as $p)
        @php
            $sudahDinilai = in_array($p->id, $dinilaiOlehSaya);
        @endphp

        <div class="col-lg-12 mb-3">
            <a href="{{ route('sibukkerja.penilaian', ['pegawai_id' => $p->id, 'triwulan' => 2]) }}" class="text-decoration-none">
                <div class="card shadow-sm mb-3 position-relative" style="border-left: {{ $sudahDinilai ? '5px solid #68b92e' : 'none' }};">
                    <div class="card-body d-flex align-items-center p-3">
                        <img src="{{ asset('storage/fotos/' . $p->foto) }}" alt="Foto Pegawai" 
                            style="width: 80px; height: 70px; object-fit: cover;" 
                            class="rounded me-3">
                        <div class="flex-grow-1">
                            <h5 class="mb-0 text-dark font-weight-bolder" style="font-size: 17px; margin-bottom: 2px;">
                                {{ $p->name }}
                            </h5>
                            <div style="line-height: 1.2;">
                                <small class="text-muted d-block" style="font-size: 12px;">NIP. {{ $p->nip }}</small>
                                <small class="text-muted" style="font-size: 12px;">{{ $p->jabatan }}</small>
                            </div>
                        </div>

                        @if ($sudahDinilai)
                            <div class="badge bg-success text-white px-2 py-1" style="font-size: 12px;">
                                <i class="bi bi-check-circle-fill me-1"></i> Sudah Dinilai
                            </div>
                        @endif
                    </div>
                </div>
            </a>
        </div>
    @endforeach
@endsection