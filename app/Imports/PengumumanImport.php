<?php

namespace App\Imports;

use App\Models\Pengumuman;
use Maatwebsite\Excel\Concerns\ToModel;

class PengumumanImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pengumuman([
            'wilayah' 		=> $row[1],
			'sekolah'       => $row[2],
			'bobot' 		=> $row[3],
			'nisn' 	        => $row[4],
			'nama_siswa' 	=> $row[5],
			'umur' 	        => $row[6],
			'kelamin'       => $row[7],
			'sekolah_asal'  => $row[8],
			'sekolah_lulus' => $row[9],
			'status'        => $row[10],
        ]);
    }
}
