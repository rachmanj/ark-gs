<?php

namespace App\Http\Controllers;

use App\Powitheta;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $po_sents = $this->po_sent_by_project();
        // dd($po_sents);
        return view('dashboard.index', compact('po_sents'));
    }

    public function po_sent_by_project()
    {
        $project = ['011C', '017C', 'APS', '000H', '001H', '005P'];

        return Powitheta::groupBy('project_code')
            ->whereIn('project_code', $project)
            ->where('description', 'not like', '%SOLAR%')
            ->where('po_delivery_status', 'Delivered')
            ->where('po_status', '!=', 'Cancelled')
            ->selectRaw('project_code, sum(total_po_price) as po_amount')
            ->whereMonth('posting_date', '=', Carbon::now()->subMonths(1))
            ->get();
    }
}
