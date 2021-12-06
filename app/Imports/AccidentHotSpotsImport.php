<?php

namespace App\Imports;

use App\AccidentHotSpot;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
//use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class AccidentHotSpotsImport implements ToCollection
{



    public function collection(Collection  $rows)
    {
        foreach ($rows as $row)
        {
            AccidentHotSpot::create([
                'grid_code'  => $row[0],
                'lat' => $row[1],
                'lng' => $row[2],
            ]);
        }

        // return new AccidentHotSpot([
        //     'grid_code'  => $row[0],
        //     'lat' => $row[1],
        //     'lng' => $row[2],
        // ]);

    }
}
