<?php

namespace App\Exports;

use App\Migi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Carbon\Carbon;

class MigithismonthExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            '#',
            'posting_date',
            'document_type',
            'document_no',
            'project',
            'dept_code',
            'item_code',
            'qty',
            'uom',
            'created_at',
            'updated_at'
        ];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $this_month = Carbon::now();
        $all_project = ['011C', '017C', 'APS'];

        return $this->outgoing_qty($this_month, $all_project);
    }

    public function outgoing_qty($month, $project)
    {
        $list = Migi::whereMonth('posting_date', '=', $month);;
        $incl_deptcode = ['40', '50', '60', '140'];

        $excl_itemcode = ['%EX-FUEL%', '%OLA%', '%EX-%', '%SA-%', '%SV-%', '%CONS%']; // , 
        foreach ($excl_itemcode as $e) {
            $excl_itemcode_arr[] = ['item_code', 'not like', $e];
        }

        $excl_uom = ['%L%', '%M%', '%CM%'];
        foreach ($excl_uom as $e) {
            $excl_uom_arr[] = ['uom', 'not like', $e];
        }

        return $list->whereIn('project_code', $project)
            ->whereIn('dept_code', $incl_deptcode)
            ->where($excl_itemcode_arr)
            // ->where($excl_uom_arr)
            ->get();
    }
}
