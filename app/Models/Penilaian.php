<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    protected $table = 'penilaian';

    protected $fillable = [
        'penilai_id',
        'pegawai_id',
        'nilai_1',
        'nilai_2',
        'nilai_3',
        'nilai_4',
        'nilai_5',
        'nilai_6',
        'nilai_7',
        'nilai_8',
        'total_nilai',
        'nilai_akhir',
        'tahun',
        'triwulan',
    ];

    public function pegawai()
    {
        return $this->belongsTo(User::class, 'pegawai_id');
    }

    public function penilai()
    {
        return $this->belongsTo(User::class, 'penilai_id');
    }
}
