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
            'No',
            'NIM',
            'Nama',
            'Jenis Kelamin',
            'Ayah',
            'Prediket',
            'Foto',
            'Fakultas',
            'Program Studi',
            'Semester',
            'Tanggal Lulus',
            'IPK',
            'Tanggal SKL',
            'Tanggal Validasi',
            'Periode',
            'Tahun Akademik',
            'Keterangan',
            'Semester',
            'Judul',
        ];
    }

    public function chunkSize(): int
    {
        return 100; // Adjust the chunk size as needed
    }
}
