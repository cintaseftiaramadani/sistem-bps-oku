@extends('layouts.user_type.auth')

@push('styles')
   <style>
        .custom-download-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 16px;
            border: 2px solid #11696b;
            color: #11696b;
            background-color: white;
            font-weight: bold;
            border-radius: 9999px;
            transition: all 0.3s ease-in-out;
            cursor: pointer;
            text-decoration: none;
        }

        .custom-download-btn:hover {
            background-color: #11696b;
            color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        .custom-download-btn svg {
            width: 16px;
            height: 16px;
        }
    </style>
@endpush

@section('content')
    <div class="container mt-0">
    {{-- Tombol kembali --}}
    <a href="{{ route('menu_akun') }}" class="btn p-2 mb-1" style="color: gray; font-size: 1.5rem;">
        <i class="fas fa-arrow-left"></i>
    </a>

        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h3 class="mb-1">  Akun Belanja Jasa Profesi </h3>
                <small style="font-size: 14px;">(522151) : - </small>
            </div>
            <button id="downloadBtn" class="custom-download-btn">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5m0 0l5-5m-5 5V4" />
                </svg>
                UNDUH PDF
            </button>
        </div>
        <script>
            const downloadBtn = document.getElementById('downloadBtn');
            downloadBtn.addEventListener('click', () => {
                const pdfPath = encodeURI('/dokumen_lubaca/pdf/akun_belanja_jasa_profesi.pdf');
                window.open(pdfPath, '_blank');
            });
        </script>

        <div class="table-responsive">
            <table class="table table-bordered table-sm text-sm" style="border: 1px solid #ddd;">
                <thead class="table-light text-center">
                    <tr style="font-size: 13px;">
                        <th style="width: 5px;" style="border: 1px solid #ddd;">No</th>
                        <th style="width: 200px;" style="border: 1px solid #ddd;">Kelengkapan</th>
                        <th style="width: 100px;" style="border: 1px solid #ddd;">Honor Innas/Inda</th>
                        <th style="width: 100px;" style="border: 1px solid #ddd;">Kepala Petugas <br> Non PNS</th>
                        <th style="width: 100px;" style="border: 1px solid #ddd;">Honor Petugas <br> PNS BPS/PNS Non BPS</th>
                        <th style="width: 200px;" style="border: 1px solid #ddd;">Kelengkapan</th>
                    </tr>
                </thead>
                <tbody style="font-size: 13px;">
                    <tr>
                        <td class="text-center">1</td>
                        <td>
                            <a href="{{ asset('dokumen_lubaca/KAK.docx') }}" download class="text-decoration-underline">KAK</a>
                        </td>
                        <td class="text-center">√</td>
                        <td class="text-center">√</td>
                        <td class="text-center">√</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">2</td>
                        <td>
                            <a href="{{ asset('dokumen_lubaca/Form Permintaan Honor.docx') }}" download class="text-decoration-underline">Form Permintaan Honor</a>
                        </td>
                        <td class="text-center">√</td>
                        <td class="text-center">√</td>
                        <td class="text-center">√</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">3</td>
                        <td>
                            <a href="{{ asset('dokumen_lubaca/Daftar Hadir Peserta.docx') }}" download class="text-decoration-underline">Daftar Hadir Peserta <br> (termasuk panitia, Innas/Inda)</a>
                        </td>
                        <td class="text-center">√</td>
                        <td class="text-center">-</td>
                        <td class="text-center">-</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">4</td>
                        <td>
                            <a href="{{ asset('dokumen_lubaca/Daftar Real Aktivitas.docx') }}" download class="text-decoration-underline">Daftar Real Aktivitas Jam Mengajar Innas/Inda <br> setiap sesi per hari</a>
                        </td>
                        <td class="text-center">√</td>
                        <td class="text-center">-</td>
                        <td class="text-center">-</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">5</td>
                        <td> 
                            <a href="{{ asset('dokumen_lubaca/SK KPA .docx') }}" download class="text-decoration-underline">SK KPA tentang honor/ Surat Tugas</a>
                        </td>
                        <td class="text-center">√</td>
                        <td class="text-center">√</td>
                        <td class="text-center">√</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">6</td>
                        <td>  
                            <a href="{{ asset('dokumen_lubaca/Surat Kontrak.docx') }}" download class="text-decoration-underline">Surat Kontrak</a>
                        </td>
                        <td class="text-center">√</td>
                        <td class="text-center">-</td>
                        <td class="text-center">-</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">7</td>
                        <td>
                            <a href="{{ asset('dokumen_lubaca/Surat pernyataan.docx') }}" download class="text-decoration-underline">Surat pernyataan kesanggupan melaksanakan <br>pendataan</a>
                        </td>
                        <td class="text-center">√</td>
                        <td class="text-center">√</td>
                        <td class="text-center">-</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">8</td>
                        <td> 
                            <a href="{{ asset('dokumen_lubaca/Laporan innasInda.docx') }}" download class="text-decoration-underline">Laporan innas/Inda</a>
                        </td>
                        <td class="text-center">√</t√d>
                        <td class="text-center">-</td>
                        <td class="text-center">-</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">9</td>
                        <td style="border: 1px solid #ddd;">
                            <a href="{{ asset('dokumen_lubaca/Rekapitulasi Belanja Honor.docx') }}" download class="text-decoration-underline">Rekapitulasi Belanja Honor</a>
                        </td>
                        <td class="text-center" style="border: 1px solid #ddd;">√</td>
                        <td class="text-center" style="border: 1px solid #ddd;">√</td>
                        <td class="text-center" style="border: 1px solid #ddd;">√</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">10</td>
                        <td style="border: 1px solid #ddd;">
                            <a href="{{ asset('dokumen_lubaca/BAST Penyelesaian pekerjaan.docx') }}" download class="text-decoration-underline">BAST Penyelesaian pekerjaan</a>
                        </td>
                        <td class="text-center" style="border: 1px solid #ddd;">-</td>
                        <td class="text-center" style="border: 1px solid #ddd;">-</td>
                        <td class="text-center" style="border: 1px solid #ddd;">√</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">11</td>
                        <td style="border: 1px solid #ddd;">
                            <a href="{{ asset('dokumen_lubaca/SSP PPh Pasal 21.docx') }}" download class="text-decoration-underline">SSP PPh Pasal 21</a>
                        </td>
                        <td class="text-center" style="border: 1px solid #ddd;">√</td>
                        <td class="text-center" style="border: 1px solid #ddd;">√</td>
                        <td class="text-center" style="border: 1px solid #ddd;">√</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">12</td>
                        <td style="border: 1px solid #ddd;"> 
                            <a href="{{ asset('dokumen_lubaca/Laporan Pelatihan.docx') }}" download class="text-decoration-underline">Laporan Pelatihan Sudah Upload</a>
                        </td>
                        <td class="text-center" style="border: 1px solid #ddd;">-</td>
                        <td class="text-center" style="border: 1px solid #ddd;">-</td>
                        <td class="text-center" style="border: 1px solid #ddd;">√</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">13</td>
                        <td style="border: 1px solid #ddd;">  
                            <a href="{{ asset('dokumen_lubaca/Dokumentasi Pencacahan.docx') }}" download class="text-decoration-underline">Dokumentasi Pencacahan Sudah Upload</a>
                        </td>
                        <td class="text-center" style="border: 1px solid #ddd;">-</td>
                        <td class="text-center" style="border: 1px solid #ddd;">√</td>
                        <td class="text-center" style="border: 1px solid #ddd;">√</td>
                        <td></td>
                    </tr>
                     <tr>
                        <td class="text-center">14</td>
                        <td style="border: 1px solid #ddd;">
                            <a href="{{ asset('dokumen_lubaca/Dokumentasi Pengawasan.docx') }}" download class="text-decoration-underline">Dokumentasi Pengawasan atau <br> Pemeriksaan Sudah Upload</a>
                        </td>
                        <td class="text-center" style="border: 1px solid #ddd;">-</td>
                        <td class="text-center" style="border: 1px solid #ddd;">√</td>
                        <td class="text-center" style="border: 1px solid #ddd;">√</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">15</td>
                        <td style="border: 1px solid #ddd;">
                            <a href="{{ asset('dokumen_lubaca/Dokumentasi Supervisi.docx') }}" download class="text-decoration-underline">Dokumentasi Supervisi Sudah Upload</a>
                        </td>
                        <td class="text-center" style="border: 1px solid #ddd;">-</td>
                        <td class="text-center" style="border: 1px solid #ddd;">√</td>
                        <td class="text-center" style="border: 1px solid #ddd;">√</td>
                        <td></td>
                    </tr>
                     <tr>
                        <td class="text-center">16</td>
                        <td style="border: 1px solid #ddd;"> 
                            <a href="{{ asset('dokumen_lubaca/Bukti Pembayaran.docx') }}" download class="text-decoration-underline">Bukti Pembayaran Bank atau <br> Kantor Pos Kepada Petugas</a>
                        </td>
                        <td class="text-center" style="border: 1px solid #ddd;">√</td>
                        <td class="text-center" style="border: 1px solid #ddd;">√</td>
                        <td class="text-center" style="border: 1px solid #ddd;">√</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        <div class="mt-3" style="font-size: 12px;">
            <strong>Catatan:</strong>
            <ol class="ps-3">
                <li>Besaran Pajak untuk PNS:
                    <ul class="ps-3">
                        <li>Gol IV = 15%, Gol III = 5%, Gol II = 0%</li>
                    </ul>
                </li>
                <li>Besaran pajak untuk mitra non PNS:
                    <ul class="ps-3">
                        <li>a. PTKP sebesar Rp 4.500.000/bulan</li>
                        <li>Jika nilai bruto &lt; PTKP, maka tidak dikenakan pajak</li>
                        <li>Jika nilai bruto &gt; PTKP, maka pemotongan pajaknya adalah:
                            <ul class="ps-3">
                                <li>*Jika memiliki NPWP, 5% × (Nilai bruto per bulan − PTKP)</li>
                                <li>*Jika non NPWP, 6% × (Nilai bruto per bulan − PTKP)</li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ol>
        </div>
    </div>
@endsection