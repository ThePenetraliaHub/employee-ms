<?php

namespace App\Imports;

use App\Department;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
//use Illuminate\Support\Facades\Validator;

class DepartmentImport implements ToCollection,WithStartRow
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
                Department::create([
                    "id"=>     $row[0],
                    "name"=>     $row[1],
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
