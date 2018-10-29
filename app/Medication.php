<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    public $primaryKey = "drugId";

    public function medication()
    {
        return $this->belongsTo('App\Medication');
    }
}
