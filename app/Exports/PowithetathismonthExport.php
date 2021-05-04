<?php

namespace App\Exports;

use App\Powitheta;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PowithetathismonthExport implements FromCollection, WithHeadings
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
        $date = Carbon::now();
        $all_project = ['011C', '017C', 'APS'];

        return $this->po_sent_amount($date, $all_project);
    }

    public function po_sent_amount($date, $project)
    {
        $incl_deptcode = ['40', '50', '60', '140'];

        $excl_itemcode = ['EX%', 'FU%', 'PB%', 'Pp%', 'SA%', 'SO%', 'SV%']; // , 
        foreach ($excl_itemcode as $e) {
            $excl_itemcode_arr[] = ['item_code', 'not like', $e];
        };

        $list = DB::table('powithetas')
            ->whereIn('dept_code', $incl_deptcode)
            ->where($excl_itemcode_arr)
            ->whereYear('po_delivery_date', $date)
            ->whereMonth('po_delivery_date', $date)
            ->whereIn('project_code', $project)
            ->where('po_status', '!=', 'Cancelled')
            ->where('po_delivery_status', '=', 'Delivered');
            // ->distinct('po_no');

        return $list->get();
    }
}
