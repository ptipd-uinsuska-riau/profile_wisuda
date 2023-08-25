<?php

namespace App\Exports;

use App\Models\Absen;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class AbsenExport implements FromQuery
{
    use Exportable;

    public function forFakultas(string $fakultas)
    {
        $this->fakultas = $fakultas;

        return $this;
    }

    /**
    * @return \Illuminate\Support\Collection
    * return Absen::query()->where('fakultas', $this->fakultas);
    */

    public function query()
    {
        return Absen::join('profiles', 'absens.id_pd', '=', 'profiles.nim')
        ->select('profiles.nim', 'profiles.nama', 'profiles.fakultas', 'profiles.prodi', 'absens.created_at')
        ->when($this->fakultas !== 'all', function ($query) {
            return $query->where('profiles.fakultas', $this->fakultas);
        });

    }

}
