@extends('layouts.user_type.auth')

@section('content')

    @php
    $triwulanData = [
      ['nama' => 'Triwulan 1', 'icon' => 'ni ni-calendar-grid-58'],
      ['nama' => 'Triwulan 2', 'icon' => 'ni ni-calendar-grid-58'],
      ['nama' => 'Triwulan 3', 'icon' => 'ni ni-calendar-grid-58'],
      ['nama' => 'Triwulan 4', 'icon' => 'ni ni-calendar-grid-58'],
    ];
    @endphp


  <div class="card text-center mb-2" >
    <div class="card-body">
      <h3 class="mb-0">
        Sistem Informasi Bukti Dukung Kinerja
      </h3>
      <p class="mb-2">
          (SIBUK KERJA)
        </p>
    </div>
  </div>

    
    <div class="row mt-2">
    <div class="col-lg-12 mb-2">
        <div class="card">
        <div class="card-body p-3">
            <div class="text-center" style="padding-left: 10px; padding-right: 10px;">
                <div class="d-flex flex-column h-100">
                    <p class="mb-1 pt-2 text-bold">Penilaian 360 Tahun 2025</p>
                    <h5 class="font-weight-bolder">PENILAIAN PEGAWAI TERBAIK (TRIWULANAN)</h5>
                    <p class="mb-2" style="font-synthesis-small-caps: ;">Penilaian 360 merupakan metode evaluasi kinerja yang menyajikan 
                      umpan balik secara menyeluruh dari berbagai sumber, termasuk atasan, rekan kerja, serta bawahan. Pendekatan ini dirancang 
                      untuk memberikan gambaran objektif dan komprehensif mengenai performa pegawai.</p>
                </div>
            </div>
        </div>
        </div>
    </div>
    </div>

    <div class="row mt-2">
    <div class="col-lg-12 mb-2">
      <div class="card">
        <div class="card-body p-1">
            <div class="d-flex flex-column">
              <p class="fw-bold my-2 text-center mb-2" >Pilihan Triwulan</p>
            </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    @foreach ($triwulanData as $triwulan)
    <div class="col-xl-3 col-sm-6 mb-xl-2 mb-4">
        <a href="{{ url(Str::slug($triwulan['nama'], '_')) }}" class="text-decoration-none">
        <div class="card">
        <div class="card-body p-3">
            <div class="row align-items-center">
            <div class="col-4 d-flex justify-content-center align-items-center">
                <div class="icon icon-shape bg-primary shadow text-center border-radius-md">
                <i class="{{ $triwulan['icon'] }} text-lg opacity-10" aria-hidden="true"></i>
                </div>
            </div>
            <div class="col-8">
                <div class="numbers">
                <h6 class="font-weight-bolder mb-0">{{ $triwulan['nama'] }}</h6>
                </div>
            </div>
            </div>
        </div>
        </div>
        </a>
    </div>
    @endforeach
    </div>

@endsection

