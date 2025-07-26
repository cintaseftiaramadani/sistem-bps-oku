@extends('layouts.user_type.auth')

@section('content')

      @php
    $akunData = [
      ['nama' => 'Akun Belanja Bahan', 'kode' => '521211', 'deskripsi' => 'Konsumsi Rapat', 'icon' => 'ni ni-box-2'],
      ['nama' => 'Akun Honor Output Kegiatan', 'kode' => '521213', 'deskripsi' => 'Honor Tim Lapangan', 'icon' => 'ni ni-single-02'],
      ['nama' => 'Akun Honor Innas/Inda', 'kode' => '000000', 'deskripsi' => '-', 'icon' => 'ni ni-hat-3'],
      ['nama' => 'Akun Belanja Sewa', 'kode' => '522141', 'deskripsi' => '-', 'icon' => 'ni ni-shop'],
      ['nama' => 'Akun Belanja Persediaan Barang Konsumsi', 'kode' => '521811', 'deskripsi' => '-', 'icon' => 'ni ni-archive-2'],
      ['nama' => 'Akun Belanja Perjalanan Dinas Biasa', 'kode' => '524111', 'deskripsi' => '-', 'icon' => 'ni ni-world'],
      ['nama' => 'Akun Belanja Perjalanan Dinas Dalam Kota', 'kode' => '524113', 'deskripsi' => '-', 'icon' => 'ni ni-pin-3'],
      ['nama' => 'Akun Belanja Perjalanan Dinas Paket Meeting Dalam Kota', 'kode' => '524114', 'deskripsi' => '-', 'icon' => 'ni ni-ui-04'],
      ['nama' => 'Akun Belanja Jasa Profesi', 'kode' => '522151', 'deskripsi' => '-', 'icon' => 'ni ni-badge'],
      ['nama' => 'Akun Belanja Jasa Lainnya', 'kode' => '522191', 'deskripsi' => '-', 'icon' => 'ni ni-settings'],
    ];
    @endphp


  <div class="card text-center mb-2" >
    <div class="card-body">
      <h3 class="mb-0">
        Lengkap Dulu Baru Cair
      </h3>
      <p class="mb-2">
          (LU BACA)
        </p>
    </div>
  </div>

  <div class="row">
  @foreach ($akunData as $akun)
  <div class="col-xl-3 col-sm-6 mb-xl-2 mb-4">
    <a href="{{ url(Str::slug($akun['nama'], '_')) }}" class="text-decoration-none">
    <div class="card">
      <div class="card-body p-3">
        <div class="row align-items-center">
          <div class="col-4 d-flex justify-content-center align-items-center">
            <div class="icon icon-shape bg-primary shadow text-center border-radius-md">
              <i class="{{ $akun['icon'] }} text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
          <div class="col-8">
            <div class="numbers">
              <h6 class="font-weight-bolder mb-0">{{ $akun['nama'] }}</h6>
              <p class="text-sm mb-0 text-capitalize">({{ $akun['kode'] }}) </p>
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