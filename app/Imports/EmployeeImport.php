<?php

namespace App\Imports;

use App\Employee;
use Maatwebsite\Excel\Concerns\ToModel;

class EmployeeImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Employee([   
            "id"=>                $row[0],
            "supervisor_id"=>     $row[1],
            "department_id" =>    $row[2],
            "pay_grade_id"=>      $row[3],
            "employee_status_id"=>$row[4],
            "job_title_id"=>      $row[5],
            "NIN"=>               $row[6],
            "employee_number"=>   $row[7],
            "name"=>              $row[8],
            "date_of_birth"=>     $row[9],
            "gender"=>            $row[10],
            "marital_status"=>    $row[11],
            "joined_date"=>       $row[12],
            "addressline1"=>      $row[13],
            "addressline2"=>      $row[14],
            "zip_code"=>          $row[15],
            "home_phone"=>        $row[16],
            "office_phone"=>      $row[17],
            "private_email"=>     $row[18],
            "office_email"=>      $row[19],
            "created_at"=>        $row[20],
            "updated_at"=>        $row[21],
            //
        ]);
    }
}
