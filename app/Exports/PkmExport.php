<?php

namespace App\Exports;

use App\Models\Model_Pkm;
use Maatwebsite\Excel\Concerns\FromCollection;

class PkmExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Model_Pkm::all();
    }
}
