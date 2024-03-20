<?php

namespace App\Exports;

use App\Models\CpdPribadi;
use Maatwebsite\Excel\Concerns\FromCollection;

class ZonasiExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return CpdPribadi::all();
    }
}
