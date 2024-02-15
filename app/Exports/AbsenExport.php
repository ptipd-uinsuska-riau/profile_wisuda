<?php
namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AbsenExport implements FromQuery, WithHeadings
{
    use Exportable;

    public function forFakultas(string $fakultas)
    {
        $this->fakultas = $fakultas;

        return $this;
    }

    public function query()
    {
        return DB::table('profiles')
            ->select('profiles.nim', 'profiles.nama', 'profiles.fakultas', 'profiles.prodi', 'absens.created_at')
            ->join('absens', function ($join) {
                $join->on('profiles.nim', '=', 'absens.id_pd')
                    ->whereRaw('absens.id = (select max(id) from absens where absens.id_pd = profiles.nim)');
            })
            ->orderBy('absens.created_at', 'desc')
            ->when($this->fakultas !== 'all', function ($query) {
                return $query->where('profiles.fakultas', $this->fakultas);
            });
    }

    public function headings(): array
    {
        return [
            'NIM',
            'Nama',
            'Fakultas',
            'Program Studi',
            'Waktu Absen',
        ];
    }
}
