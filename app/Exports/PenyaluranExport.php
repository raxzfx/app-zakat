<?php

namespace App\Exports;

use App\Models\TransaksiPenyaluran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use Carbon\Carbon;

class PenyaluranExport implements FromCollection, WithHeadings, WithStyles, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $no = 1; // Mulai dari 1
        $totalPengeluaran = 0; // Menyimpan total pengeluaran

        // Mengambil data transaksi pengeluaran beserta jenis pengeluaran
        $data = TransaksiPenyaluran::with('jenisZakat', 'mustahiq')->get()->map(function ($transaksi) use (&$no, &$totalPengeluaran) {
            $totalPengeluaran += $transaksi->jumlah; // Menambahkan jumlah pengeluaran ke total
            return [
                'NO' => $no++,
                'Nama Penerima' => $transaksi->mustahiq->nama_lengkap,
                'Alamat' => $transaksi->alamat_penerima,
                'Jenis Pengeluaran' => $transaksi->jenisZakat ? $transaksi->jenisZakat->jenis_pengeluaran : 'Tidak ada',  // Nama jenis pengeluaran
                'Tanggal Pengeluaran' => Carbon::parse($transaksi->tgl_transaksi)->format('d/m/Y'),  // Menggunakan Carbon secara manual
                'Jumlah Pengeluaran' => $transaksi->jumlah,
            ];
        });

        // Menambahkan baris total pengeluaran
        $data->push([
            'NO' => '',
            'Nama Penerima' => 'TOTAL',
            'Alamat' => '',
            'Jenis Pengeluaran' => '',
            'Tanggal Pengeluaran' => '',
            'Jumlah Pengeluaran' => $totalPengeluaran,
        ]);

        return $data;
    }

    public function headings(): array
    {
        return ['NO', 'NAMA PENERIMA', 'ALAMAT', 'JENIS PENGELUARAN', 'TANGGAL PENGELUARAN', 'JUMLAH PENGELUARAN'];
    }

    public function styles($sheet)
    {
        $sheet->getStyle('A1:F1')->getFont()->setBold(true); // Membuat header bold
        $sheet->getStyle('A1:F1')->getAlignment()->setHorizontal('center');

        // Set style untuk total row
        $sheet->getStyle('A' . ($sheet->getHighestRow()))->getFont()->setBold(true); // Bold pada TOTAL
        $sheet->getStyle('A' . ($sheet->getHighestRow()))->getAlignment()->setHorizontal('center'); // Set rata tengah

        // Format angka pada kolom Jumlah Pengeluaran
        $sheet->getStyle('F2:F' . ($sheet->getHighestRow()))->getNumberFormat()->setFormatCode('#,##0.00'); // Format angka dengan koma dan 2 desimal
        
        // Menambahkan border di seluruh tabel (dari A1 sampai dengan E terakhir)
        $sheet->getStyle('A1:F' . ($sheet->getHighestRow()))->applyFromArray([
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
        $sheet->getStyle('A1:F1')->getFont()->setBold(true);
        $sheet->getStyle('A1:F1')->getAlignment()->setHorizontal('center');

        return $sheet;
    }


    public function title(): string
    {
        return 'Laporan Penyaluran Zakat'; // Judul untuk sheet
    }
}
