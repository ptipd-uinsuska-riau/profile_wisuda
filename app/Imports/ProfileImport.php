<?php

namespace App\Imports;

use App\Models\Profile;
use Maatwebsite\Excel\Concerns\ToModel;

class ProfileImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Profile([
            'no'        => $row[0],
            'nim'       => $row[1],
            'nama'      => $row[2],
            'ayah'      => $row[3],
            'prediket'  => $row[4],
            'foto'      => $row[5],
            'fakultas'  => $row[6],
            'prodi'     => $row[7],
            'smt'       => $row[8],
            'tgl_lulus' => $row[9],
            'ipk'       => $row[10],
            'tgl_skl'   => $row[11],
            'tgl_validasi'  => $row[12],
            'periode'   => $row[13],
            'tahun_akademik'  => $row[14],
            'keterangan'=> $row[15],
            'semester'  => $row[16]
        ]);
    }
}
