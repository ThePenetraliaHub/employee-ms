<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;
use App\JobTitle;
use Maatwebsite\Excel\Concerns\FromCollection;

class JobTitleExport implements FromCollection , WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return JobTitle::all();
    }

    public function headings(): array

    {

        return [
		'id',
        "code",
        "name",
        "description",
		"created_at",
		"updated_at",

        ];

    }
}
