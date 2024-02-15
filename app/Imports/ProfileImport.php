<?php

namespace App\Imports;

use App\Models\Profile;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
// WithHeadingRow
class ProfileImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Profile([
            'no'        => $row['no'],
            'nim'       => $row['nim'],
            'nama'      => $row['nama'],
            'jk'        => $row['jk'],
            'ayah'      => $row['ayah'],
            'prediket'  => $row['prediket'],
            'foto'      => $row['foto'],
            'fakultas'  => $row['fakultas'],
            'prodi'     => $row['prodi'],
            'smt'       => $row['smt'],
            'tgl_lulus' => $row['tgl_lulus'],
            'ipk'       => $row['ipk'],
            'tgl_skl'   => $row['tgl_skl'],
            'tgl_validasi'  => $row['tgl_validasi'],
            'periode'   => $row['periode'],
            'tahun_akademik'  => $row['tahun_akademik'],
            'keterangan'=> $row['keterangan'],
            'semester'  => $row['semester'],
            'judul'    => $row['judul'],
        ]);
    }


    // public function import(Request $request)
    // {
    //     Excel::import(new ProfileImport, request()->file('file'), null, \Maatwebsite\Excel\Excel::XLSX, ['startRow' => 2]);
    //     return to_route('profile.index');
    // }

}
