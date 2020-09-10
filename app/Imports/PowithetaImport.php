<?php

namespace App\Imports;

use App\Powitheta;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PowithetaImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Powitheta([
            'po_no' => $row['po_no'],
            'posting_date' => $row['posting_date'],
            'vendor_code' => $row['vendor_code'],
            'item_code' => $row['item_code'],
            'description' => $row['description'],
            'qty' => $row['qty'],
            'unit_price' => $row['unit_price'],
            'project_code' => $row['project_code'],
            'dept_code' => $row['dept_code'],
            'currency' => $row['currency'],
            'total_po_price' => $row['total_po_price'],
            'po_status' => $row['po_status'],
            'po_delivery_status' => $row['po_delivery_status'],
            'po_delivery_date' => $row['po_delivery_date'],
            'po_eta' => $row['po_eta'],
            'grpo_no' => $row['grpo_no'],
            'grpo_date' => $row['grpo_date'],
        ]);
    }
}
