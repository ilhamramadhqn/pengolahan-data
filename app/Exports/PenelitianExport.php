<?php

namespace App\Exports;

use App\Models\Model_Penelitian;
use Maatwebsite\Excel\Concerns\FromCollection;

class PenelitianExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Model_Penelitian::all();
    }
}
