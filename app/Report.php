<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //

    public function user(){
    	return $this->belongsTo('App\User', 'patient_id');
    }

    public function operator(){
    	return $this->belongsTo('App\User', 'operator_id');
    }

    public function tests(){
        return $this->hasMany('App\Test');
    }

    public function getCreatedAtAttribute($value)
    {
        return date('F d, Y', strtotime($value));
    }
}
