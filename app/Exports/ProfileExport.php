<?php

namespace App\Exports;

use App\Models\Profile;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Support\Collection;

class ProfileExport implements FromCollection, WithHeadings, WithChunkReading
{
    use Exportable;

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Profile::select(
            'id',
            'nim',
            'nama',
            'jk',
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
            'judul'
        )->get();
    }

    public function headings(): array
    {
        return [
            'no',
            'nim',
            'nama',
            'jk',
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
            'judul',
        ];
    }

    public function chunkSize(): int
    {
        return 100; // Adjust the chunk size as needed
    }
}
