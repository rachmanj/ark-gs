<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    protected $guarded = [];

    public function budgettype()
    {
        return $this->belongsTo(Budgettype::class);
    }
}
