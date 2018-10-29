<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    public $primaryKey = "paymentId";

    public function payment()
    {
        return $this->belongsTo('App\payments');
    }
}
