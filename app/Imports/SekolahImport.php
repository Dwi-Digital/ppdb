<?php

namespace App\Imports;

use App\Models\Sekolah;
use Maatwebsite\Excel\Concerns\ToModel;

class SekolahImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Sekolah([
            'jenjang' 		=> $row[1],
			'npsn'          => $row[2],
			'satpen' 		=> $row[3],
			'status' 		=> $row[4],
			'akreditasi' 	=> $row[5],
			'prestasi' 	    => $row[6],
			'pindahOrtu' 	=> $row[7],
			'afirmasi' 	    => $row[8],
			'zonasi' 	    => $row[9],
			'kuota'         => $row[10],
        ]);
    }
}
