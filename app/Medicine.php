<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    public $primaryKey = "med_id";

    public function Medicine(){
        return $this->belongsTo('App\Medicine');
    }
}
