<?php

namespace App\Imports;

use App\Models\Zonasi;
use Maatwebsite\Excel\Concerns\ToModel;

class ZonasiImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Zonasi([
            'kab'    		=> $row[1],
            'satpen' 		=> $row[2],
			'slug'          => $row[3],
        ]);
    }
}
