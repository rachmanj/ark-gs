<?php

namespace App\Exports;

use App\Grpo;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Carbon\Carbon;

class GrpothismonthExport implements FromCollection, WithHeadings
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
        return $this->grpo_this_month();
    }

    public function grpo_this_month()
    {
        $date = Carbon::now();
        $incl_deptcode = ['40', '50', '60', '140'];
        $excl_itemcode = ['EX%', 'FU%', 'PB%', 'Pp%', 'SA%', 'SO%', 'SV%']; // , 
        foreach ($excl_itemcode as $e) {
            $excl_itemcode_arr[] = ['item_code', 'not like', $e];
        };

        $grpos = Grpo::whereMonth('po_delivery_date', $date)
            ->whereMonth('grpo_date', $date)
            ->where('po_delivery_status', 'Delivered')
            ->whereIn('dept_code', $incl_deptcode)
            ->where($excl_itemcode_arr)
            ->get();

        return $grpos;
    }
}
