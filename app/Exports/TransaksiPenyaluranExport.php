<?php

namespace App\Exports;

use App\Models\TransaksiPenyaluran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use Carbon\Carbon;

class TransaksiPenyaluranExport implements FromCollection, WithHeadings, WithStyles, WithTitle
{
    public function collection()
    {
        $no = 1; // Mulai dari 1
        $totalPengeluaran = TransaksiPenyaluran::sum('jumlah'); // Hitung total pengeluaran
        
        // Data utama
        $data = TransaksiPenyaluran::with('jenisZakat', 'mustahiq')->get()->map(function ($transaksi) use (&$no) {
            return [
                'NO' => $no++,
                'Nama Penerima' => $transaksi->mustahiq->nama_lengkap,
                'Alamat' => $transaksi->alamat_penerima,
                'Jenis Pengeluaran' => $transaksi->jenisZakat ? $transaksi->jenisZakat->jenis_pengeluaran : 'Tidak ada',
                'Tanggal Pengeluaran' => Carbon::parse($transaksi->tgl_transaksi)->format('d/m/Y'),
                'Jumlah Pengeluaran' => $transaksi->jumlah,
            ];
        });

        // Menambahkan total di atas
        $data->prepend([
            'NO' => '',
            'Nama Penerima' => 'TOTAL',
            'Alamat' => '',
            'Jenis Pengeluaran' => '',
            'Tanggal Pengeluaran' => '',
            'Jumlah Pengeluaran' => $totalPengeluaran,
        ]);

        // Menambahkan total di bawah
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
    // Membuat header bold dan center
    $sheet->getStyle('A1:F1')->getFont()->setBold(true);
    $sheet->getStyle('A1:F1')->getAlignment()->setHorizontal('center');

    // Format untuk total di atas (baris kedua)
    $sheet->getStyle('A2:F2')->getFont()->setBold(true); // Bold total di atas
    $sheet->getStyle('A2:F2')->getAlignment()->setHorizontal('center'); // Rata tengah total di atas
    $sheet->getStyle('F2')->getNumberFormat()->setFormatCode('#,##0.00'); // Format angka jumlah di total atas

    // Format untuk total di bawah (baris terakhir)
    $lastRow = $sheet->getHighestRow();
    $sheet->getStyle('A' . $lastRow . ':F' . $lastRow)->getFont()->setBold(true); // Bold total di bawah
    $sheet->getStyle('A' . $lastRow . ':F' . $lastRow)->getAlignment()->setHorizontal('center'); // Rata tengah total di bawah
    $sheet->getStyle('F' . $lastRow)->getNumberFormat()->setFormatCode('#,##0.00'); // Format angka jumlah di total bawah

    // Format angka pada kolom data (baris ke-3 hingga baris sebelum terakhir)
    $sheet->getStyle('F3:F' . ($lastRow - 1))->getNumberFormat()->setFormatCode('#,##0.00');

    // Menambahkan border untuk seluruh tabel
    $sheet->getStyle('A1:F' . $lastRow)->applyFromArray([
        'borders' => [
            'allBorders' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                'color' => ['argb' => '000000'],
            ],
        ],
    ]);

    return $sheet;
}


    public function title(): string
    {
        return 'Laporan Transaksi Penyaluran Zakat';
    }
}
