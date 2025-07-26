<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RekapPenilaianExport;


class AdminController extends Controller
{

    public function dashboard()
    {
        return view('admin/dashboard_admin');
    }

    public function Rekap(Request $request)
    {
        $tahun = $request->input('tahun', date('Y'));
        $triwulan = $request->input('triwulan', 1);

        $rekap = User::with(['penilaian' => function ($q) use ($tahun, $triwulan) {
            $q->where('tahun', $tahun)->where('triwulan', $triwulan);
        }])
            ->get()
            ->map(function ($user) {
                $totalSkor = $user->penilaian->sum('total_nilai'); 
                $jumlahPenilai = $user->penilaian->count();
                $maxSkor = $user->penilaian->count() * 80; 
                $nilai = $maxSkor > 0 ? round(($totalSkor / $maxSkor) * 100, 2) : 0;

                return [
                    'name' => $user->name,
                    'nip' => $user->nip,
                    'jumlah_penilai' => $jumlahPenilai,
                    'total_nilai' => $totalSkor,
                    'nilai_akhir' => $nilai,
                ];
            });

        return view('admin/rekap_penilaian', compact('rekap', 'tahun', 'triwulan'));
    }

    public function exportExcel(Request $request)
    {
        $tahun = (int) $request->input('tahun', date('Y'));
        $triwulan = (int) $request->input('triwulan', 1);

        return Excel::download(new RekapPenilaianExport($tahun, $triwulan), "rekap_triwulan_{$triwulan}_{$tahun}.xlsx");
    }

    public function Pengelolaan_data_pegawai()
    {
        $rekap = User::all(); // Ambil semua data pegawai dari tabel users
        return view('admin.pengelolaan_data_pegawai', compact('rekap'));
    }
        
}
