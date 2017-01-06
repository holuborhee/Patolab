<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    //
    public $timestamps = false;

    public function report(){
    	return $this->belongsTo('App\Report');
    }

    public function getDateAttribute($value)
    {
        return date('F d, Y', strtotime($value));
    }
}
