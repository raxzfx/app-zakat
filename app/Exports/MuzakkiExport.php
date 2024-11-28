<?php

namespace App\Exports;

use App\Models\Muzakki;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStyles;

class MuzakkiExport implements FromCollection , WithHeadings , WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $no = 1;

        $data  = Muzakki::all()->map(function ($muzakki) use (&$no) {
            return [
                'NO' => $no++,
                'NIK' => $muzakki->nik,
                'Nama' => $muzakki->nama_lengkap,
                'Alamat' => $muzakki->alamat,
                'No Telp' => $muzakki->no_telp,
            ];
        });

        return $data;
    }

    public function headings(): array
    {
        return ['NO', 'NIK', 'NAMA', 'ALAMAT', 'NO TELP'];
    }

    public function styles($sheet)
    {
        $sheet->getStyle('A1:E1')->getFont()->setBold(true); // Membuat header bold
        $sheet->getStyle('A1:E1')->getAlignment()->setHorizontal('center'); // Set rata tengah

        // Menambahkan border di seluruh tabel (dari A1 sampai dengan E terakhir)
        $sheet->getStyle('A1:E' . ($sheet->getHighestRow()))->applyFromArray([
            'borders' => [
                'outline' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
        ]);
    }
}
