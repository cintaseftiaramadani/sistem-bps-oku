@extends('layouts.user_type.auth')

@section('content')
    <div class="page-header min-height-200 border-radius-xl mt-4"
      style="background-image: url('../assets/img/umum/sampul_dashboard.jpg'); background-position-y: 50%;">
      <span class=""></span>
    </div>
    <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
      <div class="row gx-4">
        <div class="col-auto">
          <div class="avatar avatar-xl position-relative">
            <img src="{{ url('storage/fotos/' . Auth::user()->foto) }}" alt="profile_image"
              class="w-100 border-radius-lg shadow-sm">
          </div>
        </div>
        <div class="col-auto my-auto">
          <div class="h-100">
            <h4 class="mb-1">{{ Auth::user()->name }}</h4>
            <p class="mb-0 font-weight-bold text-sm">
              {{ Auth::user()->jabatan }}<br>
              NIP. {{ Auth::user()->nip }}
            </p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-1 text-end">
          <a href="{{ route('ganti_password') }}" class="btn btn-sm">Ganti Kata Sandi
          </a>
        </div>
      </div>
    </div>

    <div class="container-fluid py-4">
      <div class="d-flex flex-column h-100">
        <h3 class="font-weight-bolder">REKAPITULASI PENILAIAN PEGAWAI TERBAIK (TRIWULANAN)</h3>
      </div>
      <form method="GET" class="row mb-4">
        <div class="col-md-3">
          <select name="tahun" class="form-control">
            @for ($y = date('Y'); $y >= 2020; $y--)
              <option value="{{ $y }}" {{ $tahun == $y ? 'selected' : '' }}>{{ $y }}</option>
            @endfor
          </select>
        </div>
        <div class="col-md-3">
          <select name="triwulan" class="form-control">
            @for ($i = 1; $i <= 4; $i++)
              <option value="{{ $i }}" {{ $triwulan == $i ? 'selected' : '' }}>Triwulan {{ $i }}</option>
            @endfor
          </select>
        </div>
        <div class="col-md-3 d-flex gap-2">
          <button type="submit" class="btn" style="background-color: #68b92e; color: white;">Tampilkan</button>
        </div>
      </form>

      <div class="row">
        <div class="col-md-4">
          <div class="card text-center border-2 shadow-sm" style="border-color: #68b92e;">
            <div class="card-body">
              <h5 class="card-title text-uppercase">Jumlah Penilai</h5>
              <p class="display-6">{{ $rekap['jumlah_penilai'] }}</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card text-center border-2 shadow-sm" style="border-color: #eb891b;">
            <div class="card-body">
              <h5 class="card-title text-uppercase">Total Poin</h5>
              <p class="display-6">{{ $rekap['total_nilai'] }}</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card text-center border-2 shadow-sm" style="border-color: #0093dd;">
            <div class="card-body">
              <h5 class="card-title text-uppercase">Nilai Akhir</h5>
              <p class="display-6">{{ $rekap['nilai_akhir'] }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
