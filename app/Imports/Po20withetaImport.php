<?php

namespace App\Imports;

use App\Po20witheta;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class Po20withetaImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Po20witheta([
            'po_no' => $row['po_no'],
            'posting_date' => $row['posting_date'],
            'vendor_code' => $row['vendor_code'],
            'unit_no' => $row['unit_no'],
            'item_code' => $row['item_code'],
            'uom' => $row['uom'],
            'description' => $row['description'],
            'qty' => $row['qty'],
            'unit_price' => $row['unit_price'],
            'project_code' => $row['project_code'],
            'dept_code' => $row['dept_code'],
            'po_currency' => $row['po_currency'],
            'item_amount' => $row['item_amount'],
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
