<?php

namespace App\Imports;

use App\WorkDay;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
//use Illuminate\Support\Facades\Validator;

class WorkDayImport implements ToCollection,WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection  $rows)
    {
        if($rows->count() > 1){

            foreach ($rows as $row)
            {
                WorkDay::create([
                    "id"=>               $row[0],
                    "date" =>            $row[1],
                    "start_time" =>      $row[2],
                    "end_time"=>         $row[3],
                    "day_type"=>         $row[4],
                ]);
            }
        }
        else{

        }

    }
    public function startRow(): int
    {
        return 2;

    }
}
