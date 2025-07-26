<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class PegawaiController extends Controller
{
    public function dashboard(Request $request)
    {

        $tahun = $request->input('tahun', date('Y'));
        $triwulan = $request->input('triwulan', 1);

        /** @var \App\Models\User $user */
        $user = auth()->user();

        $penilaian = $user->penilaian()
            ->where('tahun', $tahun)
            ->where('triwulan', $triwulan)
            ->get();

        $jumlah_penilai = $penilaian->count();
        $totalSkor = $penilaian->sum('total_nilai');
        $maxSkor = $jumlah_penilai * 80;
        $nilai_akhir = $maxSkor > 0 ? round(($totalSkor / $maxSkor) * 100, 2) : 0;

        $rekap = [
            'jumlah_penilai' => $jumlah_penilai,
            'total_nilai' => $totalSkor,
            'nilai_akhir' => $nilai_akhir
        ];

        return view('pegawai/dashboard_pegawai', compact('rekap', 'tahun', 'triwulan'));
    }

    // Menampilkan semua data pegawai (untuk admin)
    public function index()
    {
        $rekap = User::all();
        return view('admin/pengelolaan_data_pegawai', compact('rekap'));
    }

    public function create()
    {
        return view('admin/tambah_pegawai');
    }

    // Menyimpan data pegawai baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'nip' => 'required|string|max:50',
            'jabatan' => 'required|string|max:100',
            'role' => 'required|in:admin,pegawai',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        // Proses upload foto (jika ada)
        $namaFileFoto = null;
        if ($request->hasFile('foto')) {
            $namaFileFoto = time() . '_' . $request->foto->getClientOriginalName();
            $request->file('foto')->storeAs('public/fotos', $namaFileFoto);
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nip' => $request->nip,
            'jabatan' => $request->jabatan,
            'role' => $request->role,
            'foto' => $namaFileFoto,
        ]);

        return redirect()->route('pengelolaan_data_pegawai')->with('success', 'Pegawai baru berhasil ditambahkan.');
    }

    // Menampilkan form edit pegawai (untuk admin)
    public function edit($id)
    {
        $pegawai = User::findOrFail($id);
        return view('admin/edit_pegawai', compact('pegawai'));
    }

    // Menyimpan hasil update pegawai (untuk admin)
    public function update(Request $request, $id)
    {
        $pegawai = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'nip' => 'required|unique:users,nip,' . $id,
            'jabatan' => 'required|string',
            'role' => 'required|in:admin,pegawai',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        $pegawai->name = $request->name;
        $pegawai->email = $request->email;
        $pegawai->nip = $request->nip;
        $pegawai->jabatan = $request->jabatan;
        $pegawai->role = $request->role;

        if ($request->filled('password')) {
            $pegawai->password = Hash::make($request->password);
        }

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/fotos', $filename);

            // Hapus foto lama jika ada
            if ($pegawai->foto && Storage::exists('public/fotos/' . $pegawai->foto)) {
                Storage::delete('public/fotos/' . $pegawai->foto);
            }

            $pegawai->foto = $filename;
        }

        $pegawai->save();
        
        return redirect()->route('pengelolaan_data_pegawai')->with('success', 'Data pegawai berhasil diperbarui.');
    }

    // Menghapus pegawai (untuk admin)
    public function destroy($id)
    {
        $pegawai = User::findOrFail($id);
        $pegawai->delete();

        return redirect()->route('pengelolaan_data_pegawai')->with('success', 'Data pegawai berhasil dihapus.');
    }

}
