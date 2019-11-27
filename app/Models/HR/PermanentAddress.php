<?php

namespace App\Models\HR;

use Illuminate\Database\Eloquent\Model;

class PermanentAddress extends Model
{
    protected $table = 'permanent_address';
    protected $primaryKey = 'permanent_address_id';

     public function country()
    {
        return $this->hasOne('App\Models\Settings\Country', 'country_id','country_id');
    }

    public function division()
    {
        return $this->hasOne('App\Models\Settings\Division', 'division_id','division_id');
    }

    public function city()
    {
        return $this->hasOne('App\Models\Settings\City', 'city_id','city_id');
    }


    

}
