<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Budgettype extends Model
{

    protected $guarded = [];

    public function budgets()
    {
        return $this->hasMany(Budget::class);
    }
}
