<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Exports\RekapPenilaianExport;
use App\Models\Penilaian;
use Maatwebsite\Excel\Facades\Excel;

class SibukkerjaController extends Controller
{
    public function index()
    {
        return view('sibukkerja/menu_triwulan');
    }

    public function triwulan_1()
    {
        $currentUserId = Auth::id();
        $pegawaiLain = User::where('id', '!=', $currentUserId)->get();

        $dinilaiOlehSaya = Penilaian::where('penilai_id', $currentUserId)
            ->where('triwulan', 1)
            ->where('tahun', date('Y'))
            ->pluck('pegawai_id')
            ->toArray();

        return view('sibukkerja/triwulan_1', compact('pegawaiLain', 'dinilaiOlehSaya'));
    }

    public function triwulan_2()
    {
        $currentUserId = Auth::id();
        $pegawaiLain = User::where('id', '!=', $currentUserId)->get();

        $dinilaiOlehSaya = Penilaian::where('penilai_id', $currentUserId)
            ->where('triwulan', 2)
            ->where('tahun', date('Y'))
            ->pluck('pegawai_id')
            ->toArray();

        return view('sibukkerja/triwulan_2', compact('pegawaiLain', 'dinilaiOlehSaya'));
    }

    public function triwulan_3()
    {
        $currentUserId = Auth::id();
        $pegawaiLain = User::where('id', '!=', $currentUserId)->get();

        $dinilaiOlehSaya = Penilaian::where('penilai_id', $currentUserId)
            ->where('triwulan', 3)
            ->where('tahun', date('Y'))
            ->pluck('pegawai_id')
            ->toArray();

        return view('sibukkerja/triwulan_3', compact('pegawaiLain', 'dinilaiOlehSaya'));
    }

    public function triwulan_4()
    {
        $currentUserId = Auth::id();
        $pegawaiLain = User::where('id', '!=', $currentUserId)->get();

        $dinilaiOlehSaya = Penilaian::where('penilai_id', $currentUserId)
            ->where('triwulan', 4)
            ->where('tahun', date('Y'))
            ->pluck('pegawai_id')
            ->toArray();

        return view('sibukkerja/triwulan_4', compact('pegawaiLain', 'dinilaiOlehSaya'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pegawai_id' => 'required|exists:users,id',
            'triwulan' => 'required|in:1,2,3,4',
            'jawaban' => 'required|array|size:8',
        ]);

        for ($i = 1; $i <= 8; $i++) {
            if (!isset($request->jawaban[$i])) {
                return back()
                    ->withErrors(['jawaban.' . $i => 'Pertanyaan ini wajib diisi.'])
                    ->withInput();
            }
        }

        $sudahAda = Penilaian::where('penilai_id', Auth::id())
            ->where('pegawai_id', $request->pegawai_id)
            ->where('triwulan', $request->triwulan)
            ->where('tahun', date('Y'))
            ->exists();

        if ($sudahAda) {
            return back()->with(['gagal' => true]);
        }

        $jawaban = $request->jawaban;
        $totalSkor = array_sum($jawaban);

        Penilaian::create([
            'penilai_id' => Auth::id(),
            'pegawai_id' => $request->pegawai_id,
            'nilai_1' => $jawaban[1],
            'nilai_2' => $jawaban[2],
            'nilai_3' => $jawaban[3],
            'nilai_4' => $jawaban[4],
            'nilai_5' => $jawaban[5],
            'nilai_6' => $jawaban[6],
            'nilai_7' => $jawaban[7],
            'nilai_8' => $jawaban[8],
            'total_nilai' => $totalSkor,
            'nilai_akhir' => round(($totalSkor / 80) * 100, 2), 
            'triwulan' => $request->triwulan,
            'tahun' => date('Y'),
        ]);

        return back()->with([
            'sukses' => true,
            'total_nilai' => $totalSkor,
            'triwulan' => $request->triwulan
        ]);
    }

    public function Penilaian()
    {
        return view('sibukkerja/penilaian');
    }

    public function formPenilaian($pegawai_id, $triwulan)
    {
        $pegawai = User::findOrFail($pegawai_id);
        return view('sibukkerja/penilaian', compact('pegawai', 'triwulan'));
    }


    public function pilihPegawai($triwulan)
    {
        $currentUserId = Auth::id();

        $pegawaiLain = User::where('id', '!=', $currentUserId)->get();

        // Cek siapa saja yang sudah dinilai oleh user login
        $dinilaiOlehSaya = Penilaian::where('penilai_id', $currentUserId)
            ->where('triwulan', $triwulan)
            ->where('tahun', date('Y'))
            ->pluck('pegawai_id')
            ->toArray();

        return view('sibukkerja.triwulan_' . $triwulan, compact('pegawaiLain', 'dinilaiOlehSaya'));
    }

    public function rekapPenilaian(Request $request)
    {
        $tahun = $request->tahun ?? date('Y');
        $triwulan = $request->triwulan ?? 1;

        $pegawaiList = User::all();

        $rekap = $pegawaiList->map(function ($pegawai) use ($tahun, $triwulan) {
            $penilaians = Penilaian::where('pegawai_id', $pegawai->id)
                ->where('tahun', $tahun)
                ->where('triwulan', $triwulan)
                ->get();

            if ($penilaians->isEmpty()) {
                return [
                    'name' => $pegawai->name,
                    'nip' => $pegawai->nip,
                    'jumlah_penilai' => 0,
                    'nilai_1' => null,
                    'nilai_2' => null,
                    'nilai_3' => null,
                    'nilai_4' => null,
                    'nilai_5' => null,
                    'nilai_6' => null,
                    'nilai_7' => null,
                    'nilai_8' => null,
                    'total_nilai' => 0,
                    'nilai_akhir' => 0,
                ];
            }

            return [
                'name' => $pegawai->name,
                'nip' => $pegawai->nip,
                'jumlah_penilai' => $penilaians->count(),
                'nilai_1' => round($penilaians->avg('nilai_1'), 2),
                'nilai_2' => round($penilaians->avg('nilai_2'), 2),
                'nilai_3' => round($penilaians->avg('nilai_3'), 2),
                'nilai_4' => round($penilaians->avg('nilai_4'), 2),
                'nilai_5' => round($penilaians->avg('nilai_5'), 2),
                'nilai_6' => round($penilaians->avg('nilai_6'), 2),
                'nilai_7' => round($penilaians->avg('nilai_7'), 2),
                'nilai_8' => round($penilaians->avg('nilai_8'), 2),
                'total_nilai' => $penilaians->sum('total_nilai'),
                'nilai_akhir' => round($penilaians->avg('nilai_akhir'), 2),
            ];
        })
        
        ->sortByDesc('nilai_akhir') 
        ->values(); 

       return Excel::download(new RekapPenilaianExport($rekap, $tahun, $triwulan),
        "Rekapitulasi_Penilaian_Triwulan_$triwulan.xlsx");
    }

}

