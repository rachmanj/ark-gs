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
        /** 
        $report_date = Carbon::now()->subDays(1);
        $month = Carbon::now()->subMonth()->format('m'); //->month;
        $year = Carbon::now()->submonth()->format('Y');
        $start_date = $year . '-' . $month . '-' . '15';
        $po_post_rangeDate = [$start_date, $report_date];
        $this_month = Carbon::now();
        $all_project = ['011C', '017C', 'APS'];

        return $this->po_sent_amount($po_post_rangeDate, $this_month, $all_project);
         **/

        $now = Carbon::now();
        $year = $now->year;
        $month = $now->month;
        $all_project = ['011C', '017C', 'APS'];
        $data_date = $now->subDay();

        return $this->po_sent_amount($year, $month, $all_project);
    }

    /**public function po_sent_amount($rangeDate, $month, $project)
    {
        $list = Powitheta::whereBetween('posting_date', $rangeDate)->whereMonth('po_delivery_date', $month);
        $incl_deptcode = ['40', '50', '60', '140'];

        $excl_itemcode = ['%EX-FUEL%', '%OLA%', '%EX-%', '%SA-%'];
        foreach ($excl_itemcode as $e) {
            $excl_itemcode_arr[] = ['item_code', 'not like', $e];
        }

        return $list->whereIn('project_code', $project)
            ->whereIn('dept_code', $incl_deptcode)
            ->where($excl_itemcode_arr)
            ->where('po_delivery_status', 'Delivered')
            ->where('po_status', '!=', 'Cancelled')
            ->get();
    } **/

    public function po_sent_amount($year, $month, $project)
    {
        $incl_deptcode = ['40', '50', '60', '140'];

        $excl_itemcode = ['%EX-FUEL%', '%OLA%', '%EX-%', '%SA-%'];
        foreach ($excl_itemcode as $e) {
            $excl_itemcode_arr[] = ['item_code', 'not like', $e];
        }

        $list = DB::table('powithetas')
            ->whereIn('dept_code', $incl_deptcode)
            ->where($excl_itemcode_arr)
            ->whereYear('po_delivery_date', $year)
            ->whereMonth('po_delivery_date', $month)
            // ->distinct('po_no')
            ->whereIn('project_code', $project)
            ->where('po_status', '!=', 'Cancelled');

        return $list->get();
    }
}
