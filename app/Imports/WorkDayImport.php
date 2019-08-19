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
//        Validator::make($rows->toArray(), [
//            '*.0' => 'required|unique:customers,CustomerName',
//            //'supervisor_id' => 'required',
//            '*.1' => 'required',
//            'NIN' => 'required|unique:employees,NIN',
//            'employee_number' => 'required|unique:employees,employee_number',
//            'name' => 'required',
//            'date_of_birth' => 'required',
//            'gender' => 'required',
//            'marital_status' => 'required',
//            'joined_date' => 'required',
//            'addressline1' => 'required',
//            // 'zip_code' => 'required',
//            'home_phone' => 'required|unique:employees,home_phone',
//            //'office_phone' => 'required',
//            'private_email' => 'required|unique:employees,private_email',
//            'office_email' => 'required|unique:employees,office_email',
//            'job_title_id' => 'required',
//            'pay_grade_id' => 'required',
//            'employee_status_id' => 'required'
//        ])->validate();



        if($rows->count() > 1){

            foreach ($rows as $row)
            {
                WorkDay::create([
                    "day"=>               $row[0],
                    "start_time" =>       $row[1],
                    "end_time"=>          $row[2],
                    "day_type"=>          $row[3],
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
