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
            'posting_date',
            'vendor_code',
            'item_code',
            'description',
            'uom',
            'qty',
            'project_code',
            'dept_code',
            'po_currency',
            'unit_price',
            'item_amount',
            'total_po_price',
            'po_status',
            'po_delivery_status',
            'po_delivery_date',
            'po_eta',
            'remarks',
            'grpo_no',
            'grpo_date',
            'created_at',
            'updated_at',
            'unit_no',
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
