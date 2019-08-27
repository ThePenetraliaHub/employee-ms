<?php

namespace App\Imports;

use App\Employee;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
//use Illuminate\Support\Facades\Validator;

class EmployeeImport implements ToCollection,WithStartRow
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
                Employee::create([
                    "supervisor_id"=>     $row[0],
                    "department_id" =>    $row[1],
                    "pay_grade_id"=>      $row[2],
                    "employee_status_id"=>$row[3],
                    "job_title_id"=>      $row[4],
                    "NIN"=>               $row[5],
                    "employee_number"=>   $row[6],
                    "name"=>              $row[7],
                    "date_of_birth"=>     $row[8],
                    "gender"=>            $row[9],
                    "marital_status"=>    $row[10],
                    "joined_date"=>       $row[11],
                    "addressline1"=>      $row[12],
                    "addressline2"=>      $row[13],
                    "zip_code"=>          $row[14],
                    "home_phone"=>        $row[15],
                    "office_phone"=>      $row[16],
                    "private_email"=>     $row[17],
                    "office_email"=>      $row[18],
                    "avatar"=>            $row[19],
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
