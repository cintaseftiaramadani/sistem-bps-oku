<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class LubacaController extends Controller
{
    public function index()
    {
        return view('lubaca/menu_akun');
    }

    public function Akun_belanja_bahan()
    {
        return view('lubaca/akun_belanja_bahan');
    }

    public function Akun_honor_output_kegiatan()
    {
        return view('lubaca/akun_honor_output_kegiatan');
    }

    public function Akun_honor_innasinda()
    {
        return view('lubaca/akun_honor_innasinda');
    }

    public function Akun_belanja_sewa()
    {
        return view('lubaca/akun_belanja_sewa');
    }

    public function Akun_belanja_persediaan_barang_konsumsi()
    {
        return view('lubaca/akun_belanja_persediaan_barang_konsumsi');
    }

    public function Akun_belanja_perjalanan_dinas_biasa()
    {
        return view('lubaca/akun_belanja_perjalanan_dinas_biasa');
    }

    public function Akun_belanja_perjalanan_dinas_dalam_kota()
    {
        return view('lubaca/akun_belanja_perjalanan_dinas_dalam_kota');
    }
    
    public function Akun_belanja_perjalanan_dinas_paket_meeting_dalam_kota()
    {
        return view('lubaca/akun_belanja_perjalanan_dinas_paket_meeting_dalam_kota');
    }

    public function Akun_belanja_jasa_profesi()
    {
        return view('lubaca/akun_belanja_jasa_profesi');
    }

    public function Akun_belanja_jasa_lainnya()
    {
        return view('lubaca/akun_belanja_jasa_lainnya');
    }

}
