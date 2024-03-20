<?php

namespace App\Imports;

use App\Models\Desa;
use Maatwebsite\Excel\Concerns\ToModel;

class DesaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Desa([
            'id_kec'=>$row[1],
            'kode'=>$row[2],
            'nm_desa'=>$row[3],
            'slug'=>$row[4],
        ]);
    }
}
