<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class treatment extends Model
{
    public $primaryKey = "treatmentId";

    public function treatment(){
        return $this->belongsTo('App\treatment');
    }
    public function patients(){
        return $this->hasMany('App\registerPat');
    }
    public  function precheck()
    {
        return $this->hasMany('App\Precheck');
    }
}
