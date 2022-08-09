<?php

namespace App\Imports;

use App\Models\Model_Penelitian;
use Maatwebsite\Excel\Concerns\ToModel;

class PenelitianImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Model_Penelitian([
            //
            'id_sumber' => $row[1],
            'id_jenis_penelitian' => $row[2],
            'id_semester' => $row[3],
            'judul_penelitian' => $row[4],
            'tahun' => $row[5],
            'status' => $row[8]
        ]);
    }
}
