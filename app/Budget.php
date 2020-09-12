<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    public function budgettype()
    {
        return $this->belongsTo(Budget::class);
    }
}
