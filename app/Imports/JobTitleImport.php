<?php

namespace App\Imports;

use App\JobTitle;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
//use Illuminate\Support\Facades\Validator;

class JobTitleImport implements ToCollection,WithStartRow
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
                JobTitle::create([
                    "id"=>     $row[0],
                    "code"=>     $row[1],
                    "title"=>     $row[2],
                    "description"=>     $row[3],
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
