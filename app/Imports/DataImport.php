<?php

namespace App\Imports;

use App\Models\Data;
use Maatwebsite\Excel\Concerns\ToModel;

class DataImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Data([
            'sekolah'   =>$row[1],
            'nik'       =>$row[2],
            'nisn'      =>$row[3],
            'nama'      =>$row[4],
            'tmp_lahir' =>$row[5],
            'tgl_lahir' =>$row[6],
            'kelamin'   =>$row[7],
            'kab_kota'  =>$row[8],
            'kec'       =>$row[9],
            'desa'      =>$row[10],
            'dusun'     =>$row[11],
        ]);
    }
}
