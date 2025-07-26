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
              <img src="{{ asset('storage/fotos/' . Auth::user()->foto) }}" alt="profile_image" 
              class="w-100 border-radius-lg">
            </div>
          </div>

          <div class="col-auto my-auto">
            <div class="h-100">
              <h3 class="mb-1">
                {{ Auth::user()->name }}
              </h3>
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


  <div class="row mt-4">
    <div class="col-lg-5">
      <div class="card h-100 p-3">
        <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: url('../assets/img/ivancik.jpg');">
          <span class="mask bg-gradient-dark"></span>
          <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
            <h5 class="text-white font-weight-bolder mb-0 pt-2">REKAPITULASI PENILAIAN 360</h5>
            <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="{{ url('rekap_penilaian') }}">
              Lihat Selengkapnya
              <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-5">
      <div class="card h-100 p-3">
        <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: url('../assets/img/ivancik.jpg');">
          <span class="mask bg-gradient-dark"></span>
          <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
            <h5 class="text-white font-weight-bolder mb-0 pt-2">PENGELOLAAN DATA PEGAWAI</h5>
            <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="pengelolaan_data_pegawai">
              Kelola Data
              <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  
@endsection