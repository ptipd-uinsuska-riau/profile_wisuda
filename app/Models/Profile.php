<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim',
        'nama',
        'ayah',
        'prediket',
        'foto',
        'fakultas',
        'prodi',
        'smt',
        'tgl_lulus',
        'ipk',
        'tgl_skl',
        'tgl_validasi',
        'periode',
        'tahun_akademik',
        'keterangan',
        'semester'
    ];

    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    // kalau foto kosong, kasih default value dari resource foto
    public function getFoto()
    {
        if (!$this->foto) {
            return asset('foto/default.jpg');
        }
        return asset('foto/' . $this->foto);
    }
}
