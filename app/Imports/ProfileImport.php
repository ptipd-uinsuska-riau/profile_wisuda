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
            'jk'        => $row[3],
            'ayah'      => $row[4],
            'prediket'  => $row[5],
            'foto'      => $row[6],
            'fakultas'  => $row[7],
            'prodi'     => $row[8],
            'smt'       => $row[9],
            'tgl_lulus' => $row[10],
            'ipk'       => $row[11],
            'tgl_skl'   => $row[12],
            'tgl_validasi'  => $row[13],
            'periode'   => $row[14],
            'tahun_akademik'  => $row[15],
            'keterangan'=> $row[16],
            'semester'  => $row[17]
        ]);
    }
}
