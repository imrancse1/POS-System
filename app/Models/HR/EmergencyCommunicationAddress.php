<?php

namespace App\Models\HR;

use Illuminate\Database\Eloquent\Model;

class EmergencyCommunicationAddress extends Model
{
    protected $table = 'emergency_communication_address';
    protected $primaryKey = 'emergency_communication_address_id';

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
