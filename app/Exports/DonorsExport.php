<?php

namespace App\Exports;

use App\Models\Donor;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DonorsExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Donor::all();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Email',
            'Phone Number',
            'CNIC',
            'Payment',
            'Address',
            'Description',
            'Created At',
            'Updated At',
        ];
    }
}

