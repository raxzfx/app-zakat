<?php

namespace App\Exports;

use App\Models\Mustahiq;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;

class MustahiqExport implements FromCollection ,WithHeadings , WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $no =1;
        $data  = Mustahiq::all()->map(function ($mustahiq) use (&$no) {
            return [
                'NO' => $no++,
                'NIK' => $mustahiq->nik,
                'Nama' => $mustahiq->nama_lengkap,
                'nama jenis' => $mustahiq->nama_jenis,
            ];
        });
        return $data;
    }
    public function headings(): array
    {
        return [
            'NO',
            'NIK',
            'Nama',
            'nama jenis',
        ];
    }

    public function styles($sheet)
    {
        $sheet->getStyle('A1:E1')->getFont()->setBold(true); // Membuat header bold
        $sheet->getStyle('A1:E1')->getAlignment()->setHorizontal('center'); // Set rata tengah

        // Menambahkan border di seluruh tabel (dari A1 sampai dengan E terakhir)
        $sheet->getStyle('A1:D' . ($sheet->getHighestRow()))->applyFromArray([
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
