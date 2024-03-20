<?php

namespace App\Exports;

// use App\Models\CpdZonasi;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ZonasiExport implements  FromCollection, WithHeadings, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return collect($this->data);
    }

    public function headings(): array
    {
        return array_keys($this->data[0]);
    }
    public function styles(Worksheet $sheet)
    {
        // Tentukan warna latar belakang untuk header tabel di baris 1
        $sheet->getStyle('A1:' . $sheet->getHighestColumn() . '1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FF3399FF');
    }
}
