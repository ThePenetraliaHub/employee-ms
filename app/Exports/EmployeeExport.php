<?php

namespace App\Exports;

use App\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmployeeExport implements FromCollection , WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Employee::all();
    }

        public function headings(): array

    {

        return [
		'id',
		"supervisor_id",
		"department_id",
		"pay_grade_id",
		"employee_status_id",
		"job_title_id",
		"NIN",
		"employee_number",
		"name",
		"date_of_birth",
		"gender",
		"marital_status",
		"joined_date",
		"addressline1",
		"addressline2",
		"zip_code",
		"home_phone",
		"office_phone",
		"private_email",
		"office_email",
		"created_at",
		"updated_at",

        ];

    }
}
