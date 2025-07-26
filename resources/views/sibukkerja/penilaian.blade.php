@extends('layouts.user_type.auth')

@push('styles')
    <style>
        .label-pertanyaan {
            font-size: 16px;
            font-weight: bold;
            color: #444444;
        }

        .custom-radio-box {
            position: relative;
        }

        .custom-radio-box input[type="radio"] {
            display: none;
        }

        .custom-radio-box label {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: 45px;
            background-color: white;
            color: #68b92e; /* hijau BPS */
            font-weight: bold;
            border-radius: 12px;
            cursor: pointer;
            border: 2px solid #68b92e; /* garis hijau */
            transition: all 0.2s ease-in-out;
            user-select: none;
        }

        .custom-radio-box input[type="radio"]:checked + label {
            background-color: #68b92e; 
            color: white;
            border-color: #68b92e;
        }

        .custom-radio-box label:hover {
            background-color: #e6f5eb; /* sedikit efek hover hijau */
        }

        button.btn:hover {
            background-color: #d87715; /* sedikit lebih gelap dari oranye BPS */
        }

        /* gnotif nya */
        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
        }
        .popup-card {
            background: #fff;
            border-radius: 20px;
            padding: 30px 25px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            text-align: center;
            font-family: 'Segoe UI', sans-serif;
            animation: slideFadeIn 0.3s ease;
        }
        @keyframes slideFadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .popup-card.success .popup-title { color: #68b92e; }
        .popup-card.error .popup-title { color: #dc3545; }
        .popup-title {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 8px;
        }
        .popup-message {
            font-size: 16px;
            color: #333;
            margin: 20px 0;
        }
        .popup-actions {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 10px;
        }
        .btn-filled {
            background-color: #68b92e;
            color: white;
            border: none;
            padding: 10px 18px;
            border-radius: 20px;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(104, 185, 46, 0.3);
        }
        .btn-filled:hover { background-color: #5ca727; }
        .btn-outline {
            background: transparent;
            border: 2px solid #ccc;
            color: #666;
            padding: 10px 18px;
            border-radius: 20px;
            font-weight: 500;
            cursor: pointer;
        }
        .btn-outline:hover {
            border-color: #aaa;
            color: #333;
        } 
    </style>
@endpush

@section('content')
    @if(session('sukses'))
        <div id="popup-notif" class="popup-overlay">
            <div class="popup-card success">
                <h3 class="popup-title">Penilaian Berhasil!</h3>
                <hr>
                <p class="popup-message">
                    Jumlah Nilai: <strong>{{ session('total_nilai') }} Poin</strong><br>
                    Terima kasih!
                </p>
                <div class="popup-actions">
                    <form action="{{ route('sibukkerja.triwulan', ['triwulan' => $triwulan]) }}">
                        <button type="submit" class="btn-filled">Lanjut Menilai</button>
                    </form>
                </div>
            </div>
        </div>
    @endif


    @if(session('gagal'))
        <div id="popup-notif" class="popup-overlay">
            <div class="popup-card error">
                <h3 class="popup-title">Penilaian Gagal!!</h3>
                <hr>
                <p class="popup-message">
                    Terjadi kesalahan saat penilaian <br>atau anda sudah pernah menilai rekan ini di triwulan ini<br>Silakan coba lagi.
                </p>
                <div class="popup-actions">
                    <form action="{{ route('sibukkerja.triwulan', ['triwulan' => $triwulan]) }}">
                        <button type="submit" class="btn-filled">Keluar</button>
                    </form>
                </div>
            </div>
        </div>
    @endif


    
    <!-- Identitas Pegawai -->
    <div class="col-lg-12 mb-3">
        <div class="card shadow-sm mb-3">
            <div class="card-body d-flex align-items-center p-3">
                <img src="{{ asset('storage/fotos/' . $pegawai->foto) }}" alt="Foto Pegawai" 
                    style="width: 80px; height: 70px; object-fit: cover;" 
                    class="rounded me-3">
                <div class="flex-grow-1">
                    <h5 class="mb-0 text-dark font-weight-bolder" style="font-size: 25px; margin-bottom: 2px;">
                        {{ $pegawai->name }}
                    </h5>
                    <div style="line-height: 1.2;">
                        <small class="text-muted d-block" style="font-size: 17px;">NIP. {{ $pegawai->nip ?? '-' }}</small>
                        <small class="text-muted" style="font-size: 17px;">{{ $pegawai->jabatan ?? '-' }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Garis Pemisah -->
    <hr style="border: 0; height: 5px; background-color: rgba(0, 0, 0, 0.573); margin-bottom: 15px;">

    <p class="mb-0" style="font-synthesis-small-caps: ;">Seluruh pertanyaan dalam kuesioner ini dirancang dengan merujuk
         pada nilai-nilai inti (Core Values) ASN BerAKHLAK.</p>
                

    <!-- Form Penilaian -->
    <form action="{{ route('sibukkerja.store') }}" method="POST">
        @csrf
        <input type="hidden" name="pegawai_dinilai_id" value="{{ $pegawai->id }}">

        @php
        $pertanyaan = [
            "Memiliki Komitmen dalam menaati ketentuan masuk kerja dan jam kerja.",
            "Dapat diteladani dalam melaksanakan tanggung jawab dan tugasnya.",
            "Memiliki kemampuan bekerja sama yang baik dalam tim.",
            "Melakukan inovasi yang bermanfaat.",
            "Memiliki banyak prestasi yang berdampak positif bagi instansi.",
            "Membangun lingkungan kerja yang kondusif.",
            "Menunjukkan loyalitas terhadap Organisasi.",
            "Mampu memberikan pengaruh positif.",
        ];
        @endphp


        <hr style="border-top: 2px dashed #ccc; opacity: 0.3;" class="my-3">

        @foreach ($pertanyaan as $index => $teks)
            <div class="col-lg-12 mb-3">
                <div class="card shadow-sm">
                    <div class="card-body p-3">
                        <input type="hidden" name="pegawai_id" value="{{ $pegawai->id }}">
                        <input type="hidden" name="triwulan" value="{{ $triwulan }}">
                        <label class="form-label label-pertanyaan">
                            Pertanyaan {{ $index + 1 }}: {{ $teks }}
                        </label>
                        <div class="mt-2 d-flex flex-wrap gap-3">
                            @for ($j = 1; $j <= 10; $j++)
                                <div class="custom-radio-box">
                                    <input type="radio" name="jawaban[{{ $index + 1 }}]" id="q{{ $index + 1 }}_{{ $j }}"
                                        value="{{ $j }}"
                                        class="@error('jawaban.' . ($index + 1)) is-invalid @enderror">
                                    <label for="q{{ $index + 1 }}_{{ $j }}">{{ $j }}</label>
                                </div>
                            @endfor
                            @error('jawaban.' . ($index + 1))
                                <div class="text-danger mt-2" style="font-size: 14px;">
                                    Pertanyaan ini wajib diisi.
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="col-lg-12 text-start mb-5">
            <button type="submit" class="btn btn-warning px-4 py-2 text-white" style="background-color: #eb891b; border: none;">
                <i class="bi bi-send me-1"></i> Submit Penilaian
            </button>
        </div>
    </form>
@endsection

