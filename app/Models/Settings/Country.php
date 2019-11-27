<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';
    protected $primaryKey = 'country_id';

    public function divisions()
    {
    	return $this->hasMany('App\Models\Settings\Division','country_id','country_id');
    }

    

}
