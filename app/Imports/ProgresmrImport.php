<?php

namespace App\Imports;

use App\Progresmr;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProgresmrImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Progresmr([
            'wo_no' => $row['wo_no'],
            'wo_date' => $row['wo_date'],
            'wo_created' => $row['wo_created'],
            'wo_status' => $row['wo_status'],
            'mr_no' => $row['mr_no'],
            'mr_rev_no' => $row['mr_rev_no'],
            'mr_status' => $row['mr_status'],
            'mr_close_status' => $row['mr_close_status'],
            'mr_date' => $row['mr_date'],
            'mr_creation' => $row['mr_creation'],
            'required_date' => $row['required_date'],
            'priority' => $row['priority'],
            'project_code' => $row['project_code'],
            'pq_no' => $row['pq_no'],
            'pq_date' => $row['pq_date'],
            'pq_creation' => $row['pq_creation'],
            'pr_no' => $row['pr_no'],
            'pr_date' => $row['pr_date'],
            'pr_creation' => $row['pr_creation'],
            'pr_close_status' => $row['pr_close_status'],
            'pr_rev' => $row['pr_rev'],
            'authorizer' => $row['authorizer'],
            'answer' => $row['answer'],
            'aprv_date' => $row['aprv_date'],
            'po_no' => $row['po_no'],
            'po_date' => $row['po_date'],
            'po_creation' => $row['po_creation'],
            'po_sent' => $row['po_sent'],
            'po_eta' => $row['po_eta'],
            'po_required' => $row['po_required'],
            'grpo_no' => $row['grpo_no'],
            'grpo_date' => $row['grpo_date'],
            'grpo_creation' => $row['grpo_creation'],
            'grpo_qty' => $row['grpo_qty'],
            'curr' => $row['curr'],
            'price' => $row['price'],
            'amount' => $row['amount'],
            'ito_no' => $row['ito_no'],
            'ito_date' => $row['ito_date'],
            'ito_creation' => $row['ito_creation'],
            'ito_sent' => $row['ito_sent'],
            'iti_no' => $row['iti_no'],
            'iti_date' => $row['iti_date'],  //			
            'iti_creation' => $row['iti_creation'],
            'mi_no' => $row['mi_no'],
            'mi_date' => $row['mi_date'],
            'mi_creation' => $row['mi_creation'],
            'unit_no' => $row['unit_no'],
            'model_no' => $row['model_no'],
            'serial_no' => $row['serial_no'],
            'hm' => $row['hm'],
            'km' => $row['km'],
            'order_type' => $row['order_type'],
            'location' => $row['location'],
            'item_code' => $row['item_code'],
            'description' => $row['description'],
            'group' => $row['group'],
            'mr_qty' => $row['mr_qty'],
            'open_qty' => $row['open_qty'],
            'stock_wh' => $row['stock_wh'],
        ]);
    }
}
