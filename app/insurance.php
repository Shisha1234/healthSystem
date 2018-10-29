<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class insurance extends Model
{
    public $primaryKey = 'insureId';

    public function user(){
        return $this->belongsTo('App\User');
    }
}
