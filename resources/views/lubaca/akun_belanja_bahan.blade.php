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
                <h3 class="mb-1">Akun Belanja Bahan</h3>
                <small style="font-size: 14px;">(521211) : Konsumsi Rapat</small>
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
                const pdfPath = encodeURI('/dokumen_lubaca/pdf/akun_belanja_bahan.pdf');
                window.open(pdfPath, '_blank');
            });
        </script>

        <div class="table-responsive">
            <table class="table table-bordered table-sm text-sm" style="border: 1px solid #ddd;">
                <thead class="table-light text-center">
                    <tr style="font-size: 13px;">
                        <th style="width: 5px;" style="border: 1px solid #ddd;">No</th>
                        <th style="width: 200px;" style="border: 1px solid #ddd;">Kelengkapan</th>
                        <th style="width: 100px;" style="border: 1px solid #ddd;">Konsumsi</th>
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
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">2</td>
                        <td>
                            <a href="{{ asset('dokumen_lubaca/Form Permintaan (SM ke PPK).docx') }}" download class="text-decoration-underline">Form Permintaan (SM ke PPK)</a>                            
                        </td>
                        <td class="text-center">√</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">3</td>
                        <td>
                            <a href="{{ asset('dokumen_lubaca/Undangan.docx') }}" download class="text-decoration-underline">Undangan</a>
                        </td>
                        <td class="text-center">√</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">4</td>
                        <td>
                            <a href="{{ asset('dokumen_lubaca/Kuitansi.docx') }}" download class="text-decoration-underline">Kuitansi</a>
                        </td>
                        <td class="text-center">√</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">5</td>
                        <td>
                            <a href="{{ asset('dokumen_lubaca/Nota Pembelian.docx') }}" download class="text-decoration-underline">Nota Pembelian</a>
                        </td>
                        <td class="text-center">√</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">6</td>
                        <td>
                            <a href="{{ asset('dokumen_lubaca/Notulen.docx') }}" download class="text-decoration-underline">Notulen</a>
                        </td>
                        <td class="text-center">√</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">7</td>
                        <td>
                            <a href="{{ asset('dokumen_lubaca/Dokumentasi Rapat Sudah Upload.docx') }}" download class="text-decoration-underline">Dokumentasi Rapat Sudah Upload</a>
                        </td>
                        <td class="text-center">√</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">8</td>
                        <td>
                            <a href="{{ asset('dokumen_lubaca/Daftar hadir.docx') }}" download class="text-decoration-underline">Daftar hadir</a>
                        </td>
                        <td class="text-center">√</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">9</td>
                        <td style="border: 1px solid #ddd;">
                            <a href="{{ asset('dokumen_lubaca/SSP PPh 22/PPh 23.docx') }}" download class="text-decoration-underline">SSP PPh 22/PPh 23</a>
                        </td>
                        <td class="text-center" style="border: 1px solid #ddd;">√</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="mt-3" style="font-size: 12px;">
            <strong>Catatan :</strong>
            <ol class="ps-3">
                <li>PPN transaksi di atas 2 juta;</li>
                <li>PPh 22 dikenakan untuk transaksi di atas 2 juta;</li>
                <li>PPh 23 dikenakan untuk transaksi tanpa nilai minimal (berapapun nominalnya);</li>
                <li>Konsumsi dibeli di toko/warung dikenakan PPh 22. Sedangkan untuk konsumsi melalui jasa catering dikenakan PPh 23;</li>
                <li>Jika pembelian > Rp. 5.000.000, harus menggunakan materai 10.000;</li>
                <li>Rapat diberikan konsumsi secara <em>offline</em> minimal 2 jam melibatkan satker lain (non BPS)/masyarakat umum.</li>
            </ol>
        </div>
    </div>

@endsection