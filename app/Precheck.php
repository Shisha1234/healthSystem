<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Precheck extends Model
{
    public $primaryKey = "checkId";

    public function precheck()
    {
        return $this->belongsTo('App\Precheck');
    }
}
