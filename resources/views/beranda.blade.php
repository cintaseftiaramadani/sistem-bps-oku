@extends('layouts.user_type.auth')

@section('content')

  <div class="card text-center">
    <div class="card-body">
      <h3 class="mb-0">
        Sistem Inovasi Digital Internal Badan Pusat Statistik Kabupaten Ogan Komering Ulu
      </h3>
    </div>
  </div>

  <div class="card my-3">
    <div class="card-body d-flex align-items-center justify-content-between px-4">
      <div class="w-25 text-start">
        <img src="{{ asset('assets/img/ibu_hani.png') }}" alt="Foto Kepala BPS" 
            class="img-fluid" 
            style="height: 250px; width: auto;">
      </div>
      <div class="text-start w-75 ps-4">
        <p class="mb-0">
          Selamat datang di Sistem Inovasi Digital Internal Badan Pusat Statistik Kabupaten Ogan Komering Ulu.
          Website ini dirancang untuk mendigitalisasikan dua inovasi unggulan yang mendukung efektivitas kerja dan tata kelola dokumen di lingkungan 
          Badan Pusat Statistik Kabupaten Ogan Komering Ulu. Kedua inovasi tersebut adalah bagian dari komitmen transformasi digital yang bertujuan 
          meningkatkan efisiensi pelayanan internal, transparansi proses administratif, serta akuntabilitas dalam pelaksanaan tugas-tugas pemerintahan. <br><br>

          Melalui platform ini, pegawai dapat mengakses fitur LU BACA (Lengkap Dulu Baru Cair), serta SIBUK KERJA, keduanya dibuat menggunakan 
          sistem digital untuk mendukung kinerja pegawai. Dengan pendekatan yang sistematis dan berbasis teknologi, diharapkan seluruh proses kerja 
          menjadi lebih cepat, tepat, dan terdokumentasi dengan baik, sejalan dengan prinsip birokrasi modern yang efisien dan responsif.
        </p>
      </div>
    </div>
  </div>


  <div class="row mt-2">
    <div class="col-lg-12 mb-2">
        <div class="card">
        <div class="card-body p-3">
            <div class="text-center" style="padding-left: 10px; padding-right: 10px;">
                <div class="d-flex flex-column h-100">
                    <p class="mb-1 pt-2 text-bold">Lengkap Dulu Baru Cair</p>
                    <h5 class="font-weight-bolder">LU BACA</h5>
                    <p class="mb-2" style="font-synthesis-small-caps: ;">Sebuah sistem dokumentasi terpusat yang memuat 
                      eluruh daftar persyaratan pencairan anggaran dari berbagai jenis akun belanja di Badan Pusat Statistik 
                      Kabupaten Ogan Komering Ulu. Melalui fitur ini, pegawai dapat dengan mudah mengakses, mengunduh, dan 
                      mencetak dokumen persyaratan sesuai kebutuhan, dengan sistem navigasi yang rapi dan terstruktur. 
                      Inovasi ini diharapkan dapat meminimalisir miskomunikasi, mempercepat proses administrasi, dan mendukung 
                      prinsip transparansi dalam tata kelola anggaran.</p>
                </div>
            </div>
        </div>
        </div>
    </div>
  </div>  <div class="row mt-2">
    <div class="col-lg-12 mb-2">
        <div class="card">
        <div class="card-body p-3">
            <div class="text-center" style="padding-left: 10px; padding-right: 10px;">
                <div class="d-flex flex-column h-100">
                    <p class="mb-1 pt-2 text-bold">Sistem Informasi Bukti Dukung Kinerja</p>
                    <h5 class="font-weight-bolder">SIBUK KERJA</h5>
                    <p class="mb-2" style="font-synthesis-small-caps:;">
                      Merupakan bagian dari sistem yang lebih luas dan telah dikembangkan melalui platform 
                      <a href="https://www.sibukkerja.id/" target="_blank" class="text-decoration-underline text-primary">www.sibukkerja.id</a>, 
                      inovasi ini bertujuan untuk mengintegrasikan berbagai aspek penunjang kinerja pegawai. Dalam konteks sistem ini, 
                      fitur SIBUK KERJA yang dikembangkan secara khusus adalah proses Penilaian Pegawai Terbaik (Triwulanan), 
                      yang dilakukan secara digital, akuntabel, dan berulang secara berkala. Fitur ini memberikan ruang partisipasi 
                      yang adil antarpegawai, serta menghasilkan dokumentasi nilai kinerja secara otomatis dan terstruktur.
                    </p>
                </div>
            </div>
        </div>
        </div>
    </div>
  </div>
   
@endsection

