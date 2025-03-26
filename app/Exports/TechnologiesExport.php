<?php

namespace App\Exports;

use App\Models\Technology;
use Maatwebsite\Excel\Concerns\FromCollection;

class TechnologiesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Technology::all();
    }
}
