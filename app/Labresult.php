<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Labresult extends Model
{
    public $primaryKey = "resultId";

    public function result()
    {
        return $this->belongsTo('App\Labresult');
    }
    public  function user()
    {
        return $this->hasMany('App\User');
    }
    public function patients()
    {
        return $this->hasMany('App\registerPat');
    }
}
