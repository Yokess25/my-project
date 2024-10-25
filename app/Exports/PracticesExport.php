<?php

namespace App\Exports;

use App\Models\Practices;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PracticesExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Practices::select('id','name','age','gender','phone','email','state','district','location','address')->get();
    }
    public function headings(): array
    {
        return [
            'S.NO',
            'Name',
            'Age',
            'Gender',
            'Phone',
            'Email',
            'State',
            'District',
            'Location',
            'Address',
        ];
    }
}
