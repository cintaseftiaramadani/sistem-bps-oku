<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Penilaian;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'nip',
        'jabatan',
        'foto',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function penilaian()
    {
        return $this->hasMany(Penilaian::class, 'pegawai_id');
    }

    /**
     * Penilaian yang diterima pegawai ini.
     */
    public function penilaianDiterima(): HasMany
    {
        return $this->hasMany(Penilaian::class, 'pegawai_id');
    }

    /**
     * Penilaian yang diberikan pegawai ini ke pegawai lain.
     */
    public function penilaianDiberikan(): HasMany
    {
        return $this->hasMany(Penilaian::class, 'penilai_id');
    }

    /**
     * Penilaian yang diterima pada tahun & triwulan tertentu.
     */
    public function penilaianDiterimaUntuk($tahun, $triwulan)
    {
        return $this->penilaianDiterima()
            ->where('tahun', $tahun)
            ->where('triwulan', $triwulan);
    }
}
