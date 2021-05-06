<?php

namespace App\Exports;

use App\Powitheta;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PowithetaExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            '#',
            'po_no',
            'create_date',
            'posting_date',
            'vendor_code',
            'item_code',
            'description',
            'uom',
            'qty',
            'unit_no',
            'project_code',
            'dept_code',
            'po_currency',
            'unit_price',
            'item_amount',
            'total_po_price',
            'po_with_vat',
            'po_status',
            'po_delivery_status',
            'po_delivery_date',
            'po_eta',
            'remarks',
            'created_at',
            'updated_at',
        ];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Powitheta::all();
    }
}
