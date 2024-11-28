<?php

namespace App\Exports;

use App\Models\LaporanPengeluaran;
use App\Models\TransaksiPengeluaran;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class DataExport implements FromCollection, WithHeadings, WithStyles, WithEvents
{
    public function collection()
    {
        $no = 1; // Mulai dari 1
        // Mengambil data transaksi pengeluaran beserta jenis pengeluaran
        $data = TransaksiPengeluaran::with('jenisPengeluaran')->get()->map(function ($transaksi) use (&$no) {
            return [
                'NO' => $no++,
                'Tanggal Pengeluaran' => $transaksi->tgl_transaksi,
                'Jenis Pengeluaran' => $transaksi->jenisPengeluaran ? $transaksi->jenisPengeluaran->jenis_pengeluaran : 'Tidak ada',  // Nama jenis pengeluaran
                'Jumlah Pengeluaran' => $transaksi->jumlah,
            ];
        });

        // Tambahkan total di bagian akhir data
        $total = TransaksiPengeluaran::sum('jumlah');
        $data->push([
            'NO' => 'Total',
            'Tanggal Pengeluaran' => '',
            'Jenis Pengeluaran' => '',
            'Jumlah Pengeluaran' => $total,
        ]);

        return $data;
    }

    public function headings(): array
    {
        return ['NO', 'TANGGAL PENGELUARAN', 'JENIS', 'JUMLAH PENGELUARAN'];
    }

    public function styles($sheet)
    {
        // Membuat header bold
        $sheet->getStyle('A1:D1')->getFont()->setBold(true);
        $sheet->getStyle('A1:D1')->getAlignment()->setHorizontal('center');

        // Format angka pada kolom Jumlah Pengeluaran
        $sheet->getStyle('D2:D' . ($sheet->getHighestRow()))->getNumberFormat()->setFormatCode('#,##0.00'); // Format angka dengan koma dan 2 desimal

        // Menambahkan border di seluruh tabel (dari A1 sampai dengan D terakhir)
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

        // Membuat header bold dan center
        $sheet->getStyle('A1:D1')->getFont()->setBold(true);
        $sheet->getStyle('A1:D1')->getAlignment()->setHorizontal('center');

        return $sheet;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                // Menambahkan rumus untuk total jumlah pengeluaran
                $lastRow = $event->sheet->getHighestRow();
                $event->sheet->setCellValue('D' . ($lastRow), '=SUM(D2:D' . ($lastRow - 1) . ')');
            },
        ];
    }
}
