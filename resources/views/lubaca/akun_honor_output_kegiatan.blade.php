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
                <h3 class="mb-1">Akun Honor Output Kegiatan</h3>
                <small style="font-size: 14px;">(521213) : Honor Tim, Camat / Kepala Desa, dan Penunjuk Jalan</small>
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
                const pdfPath = encodeURI('/dokumen_lubaca/pdf/akun_honor_output_kegiatan.pdf');
                window.open(pdfPath, '_blank');
            });
        </script>

        <div class="table-responsive">
            <table class="table table-bordered table-sm text-sm" style="border: 1px solid #ddd;">
                <thead class="table-light text-center">
                    <tr style="font-size: 13px;">
                        <th style="width: 5px;" style="border: 1px solid #ddd;">No</th>
                        <th style="width: 200px;" style="border: 1px solid #ddd;">Kelengkapan</th>
                        <th style="width: 100px;" style="border: 1px solid #ddd;">Honor Tim</th>
                        <th style="width: 100px;" style="border: 1px solid #ddd;">Kepala Camat/Desa</th>
                        <th style="width: 100px;" style="border: 1px solid #ddd;">Honor Penunjuk Jalan</th>
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
                            <a href="{{ asset('dokumen_lubaca/SK KPA/SK KBPS.docx') }}" download class="text-decoration-underline">SK KPA/SK KBPS yang meliputi tugas & fungsi, 
                            <br>besaran rate, dan kedudukan dalam Pokja</a>
                        </td>
                        <td class="text-center">√</td>
                        <td class="text-center">√</td>
                        <td class="text-center">√</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">4</td>
                        <td>
                            <a href="{{ asset('dokumen_lubaca/Laporan Tim Output Pekerjaan.docx') }}" download class="text-decoration-underline">Laporan Tim/Output Pekerjaan</a>
                        </td>
                        <td class="text-center">√</td>
                        <td class="text-center">-</td>
                        <td class="text-center">-</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">5</td>
                        <td>
                            <a href="{{ asset('dokumen_lubaca/Daftar rincian penerima honor.docx') }}" download class="text-decoration-underline">Daftar rincian penerima honor output 
                            <br>kegiatan/kuitansi per orang</a>
                        </td>
                        <td class="text-center">√</td>
                        <td class="text-center">√</td>
                        <td class="text-center">√</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">6</td>
                        <td> 
                            <a href="{{ asset('dokumen_lubaca/Rekapitulasi sesuai jabatan.docx') }}" download class="text-decoration-underline">Rekapitulasi sesuai jabatan dalam 
                            <br>keanggotaan Pokja</a>
                        </td>
                        <td class="text-center">√</td>
                        <td class="text-center">-</td>
                        <td class="text-center">-</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">7</td>
                        <td>
                            <a href="{{ asset('dokumen_lubaca/Matrik Alokasi Pokja.docx') }}" download class="text-decoration-underline">Matrik Alokasi Pokja</a>
                        </td>
                        <td class="text-center">√</td>
                        <td class="text-center">-</td>
                        <td class="text-center">-</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">8</td>
                        <td> 
                            <a href="{{ asset('dokumen_lubaca/SSP PPh Pasal 21.docx') }}" download class="text-decoration-underline">SSP PPh Pasal 21</a>
                        </td>
                        <td class="text-center">√</td>
                        <td class="text-center">√</td>
                        <td class="text-center">√</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">9</td>
                        <td style="border: 1px solid #ddd;"> 
                            <a href="{{ asset('dokumen_lubaca/Bukti Transfer.docx') }}" download class="text-decoration-underline">Bukti Transfer Via Manual Bank/Via CMS</a>
                        </td>
                        <td class="text-center" style="border: 1px solid #ddd;">√</td>
                        <td class="text-center" style="border: 1px solid #ddd;">√</td>
                        <td class="text-center" style="border: 1px solid #ddd;">-</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">10</td>
                        <td style="border: 1px solid #ddd;">
                            <a href="{{ asset('dokumen_lubaca/Surat Pernyataan KPA.docx') }}" download class="text-decoration-underline">Surat pernyataan KPA untuk pembayaran tunai 
                            <br> rangka pembayaran honor penunjuk <br> jalan</a>
                        </td>
                        <td class="text-center" style="border: 1px solid #ddd;">-</td>
                        <td class="text-center" style="border: 1px solid #ddd;">-</td>
                        <td class="text-center" style="border: 1px solid #ddd;">√</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">11</td>
                        <td style="border: 1px solid #ddd;"> 
                            <a href="{{ asset('dokumen_lubaca/Kuitansi Bukti Pembayaran.docx') }}" download class="text-decoration-underline">Kuitansi/bukti pembayaran yang sudah 
                            <br>ditandatangani oleh penunjuk jalan</a>
                        </td>
                        <td class="text-center" style="border: 1px solid #ddd;">-</td>
                        <td class="text-center" style="border: 1px solid #ddd;">-</td>
                        <td class="text-center" style="border: 1px solid #ddd;">√</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">12</td>
                        <td style="border: 1px solid #ddd;"> 
                            <a href="{{ asset('dokumen_lubaca/Bukti Foto Tanda Terima.docx') }}" download class="text-decoration-underline">Kuitansi/bukti pembayaran yang sudah 
                            <br>ditandatangani oleh penunjuk jalan</a>
                        </td>
                        <td class="text-center" style="border: 1px solid #ddd;">-</td>
                        <td class="text-center" style="border: 1px solid #ddd;">-</td>
                        <td class="text-center" style="border: 1px solid #ddd;">√</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="mt-3" style="font-size: 12px;">
            <strong>Catatan :</strong>
            <ol class="ps-3">
                <li>Honor tim kegiatan harus melibatkan pihak eksternal BPS yang terkait dengan penjelasan sebagai berikut :</li>
                <li>Jumlah honor tim maksimal 2 alokasi setiap bulan</li>
                <li>Besaran Pajak untuk PNS :
                    <ul class="ps-3">
                        <li>Gol IV = 15%</li>
                        <li>Gol III = 5%</li>
                        <li>Gol II = 0%</li>
                    </ul>
                </li>
                <li>Besaran pajak untuk mitra non PNS :
                    <ul class="ps-3">
                        <li>PTKP sebesar Rp 4.500.000/bulan</li>
                        <li>Jika nilai bruto &lt; PTKP, maka tidak dikenakan pajak</li>
                        <li>Jika nilai bruto &gt; PTKP, maka pemotongan pajaknya adalah :
                            <ul class="ps-3">
                                <li>Jika memiliki NPWP: 5% × (Nilai bruto per bulan − PTKP)</li>
                                <li>Jika non NPWP: 6% × (Nilai bruto per bulan − PTKP)</li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ol>

        </div>
    </div>
@endsection