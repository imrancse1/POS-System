<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';
    protected $primaryKey = 'city_id';

    public function divisionList()
    {
    	return $this->belongsTo('App\Models\Settings\Division','division_id','division_id');
    }
    
}
