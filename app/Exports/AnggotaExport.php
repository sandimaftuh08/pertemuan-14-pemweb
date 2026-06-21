<?php

namespace App\Exports;

use App\Models\Anggota;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;


class AnggotaExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Anggota::select([
            'kode_anggota', 'nama', 'email', 'telepon', 'alamat',
            'tanggal_lahir', 'jenis_kelamin', 'pekerjaan', 'status', 'tanggal_daftar',
        ])->get();
    }

    public function headings(): array
    {
        return [
            'Kode', 'Nama', 'Email', 'Telepon', 'Alamat',
            'Tanggal Lahir', 'Jenis Kelamin', 'Pekerjaan', 'Status', 'Tanggal Daftar',
        ];
    }

    public function map($anggota): array
    {
        return [
            $anggota->kode_anggota,
            $anggota->nama,
            $anggota->email,
            $anggota->telepon,
            $anggota->alamat,
            $anggota->tanggal_lahir?->format('Y-m-d'),
            $anggota->jenis_kelamin,
            $anggota->pekerjaan,
            $anggota->status,
            $anggota->tanggal_daftar?->format('Y-m-d'),
        ];
    }
}