<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $table = 'divisions';
    protected $primaryKey = 'division_id';

    public function countryList()
    {
    	return $this->belongsTo('App\Models\Settings\Country','country_id','country_id');
    }

    public function cities()
    {
    	return $this->hasMany('App\Models\Settings\City','division_id','division_id');
    }
}


