<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class registerPat extends Model
{
    public $primaryKey= 'PatientId';

    public function patients(){
        return $this->belongsTo('App\registerPat');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
