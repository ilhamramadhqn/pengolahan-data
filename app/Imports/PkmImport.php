<?php

namespace App\Imports;

use App\Models\Model_Pkm;
use Maatwebsite\Excel\Concerns\ToModel;

class PkmImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Model_Pkm([
            'id_sumber' => $row[1],
            'id_mitra' => $row[2],
            'judul_kegiatan' => $row[3],
            'tanggal_awal' => $row[4],
            'tanggal_akhir' => $row[5],
            'status' => $row[8]
        ]);
    }
}
