<?php

namespace App\Exports;

use App\Models\Marks;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MarksExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Marks::select('student_id', 'tamil', 'english', 'maths', 'Science', 'Social')->get();
    }
    public function headings(): array
    {
        return [
            'Student_id',
            'Tamil',
            'English',
            'Maths',
            'science',
            'Social',
        ];
    }
}
