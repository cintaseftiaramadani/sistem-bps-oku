<?php

namespace App\Exports;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class RekapPenilaianExport implements FromView, WithColumnWidths, WithStyles
{
    protected $rekap;
    protected $tahun;
    protected $triwulan;

    public function __construct($rekap, $tahun, $triwulan)
    {
        $this->rekap = $rekap;
        $this->tahun = $tahun;
        $this->triwulan = $triwulan;
    }

    public function view(): View
    {
        return view('exports.rekap', [
            'rekap' => $this->rekap,
            'tahun' => $this->tahun,
            'triwulan' => $this->triwulan
        ]);
    }

    public function columnWidths(): array
    {
        return [
            'A' => 5,
            'B' => 40,
            'C' => 15,
            'D' => 10,
            'E' => 10,
            'F' => 10,
            'G' => 10,
            'H' => 10,
            'I' => 10,
            'J' => 10,
            'K' => 10,
            'L' => 15,
            'M' => 15,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $highestRow = $sheet->getHighestRow();

        // Merge cell untuk judul
        $sheet->mergeCells('A1:M1');
        $sheet->mergeCells('A2:M2');

        // Set rata tengah untuk judul
        $sheet->getStyle('A1')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('A1')->getAlignment()->setVertical('center');
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(14);

        // Rata tengah dan Border seluruh cell
        $sheet->getStyle("A1:M$highestRow")->getAlignment()->setHorizontal('center');
        $sheet->getStyle("A1:M$highestRow")->getAlignment()->setVertical('center');
        $sheet->getStyle("A1:M$highestRow")->getBorders()->getAllBorders()->setBorderStyle(
            \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
        );

        return [];
    }

}
