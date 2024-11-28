<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class UserExport implements FromCollection , WithHeadings , WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $no = 1;
        $data  = User::all()->map(function ($user) use (&$no) {
            return [
                'NO' => $no++,
                'Nama' => $user->name,
                'NIK' => $user->nik,
                'Email' => $user->email,
                'Username' => $user->username,
            ];
        });
        return $data;
    }

    public function headings(): array
    {
        return ['NO', 'NAMA','NIK', 'EMAIL', 'USERNAME'];
    }

    public function styles($sheet)
    {
        $sheet->getStyle('A1:F1')->getFont()->setBold(true); // Membuat header bold
        $sheet->getStyle('A1:F1')->getAlignment()->setHorizontal('center');

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
