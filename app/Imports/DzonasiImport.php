<?php

namespace App\Imports;

use App\Models\Dzonasi;
use Maatwebsite\Excel\Concerns\ToModel;

class DzonasiImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Dzonasi([
            'id_zonasi'     => $row[1],
            'id_desa' 		=> $row[2],
            'id_kec' 		=> $row[3],
			'bobot'         => $row[4],
        ]);
    }
}
