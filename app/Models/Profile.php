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
        'jk', // 'L' or 'P
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
        'semester',
        'hadir',
        'status',
        'judul'
    ];


}
