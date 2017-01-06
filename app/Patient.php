<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //
	public $timestamps = false;
	
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getGenderAttribute($value)
    {
        if($value == 0)
        {
            return ucfirst('female');
        }
        else return ucfirst('male');
    }

    public function getDobAttribute($value)
    {
        return date('F d, Y', strtotime($value));
    }

    
}
