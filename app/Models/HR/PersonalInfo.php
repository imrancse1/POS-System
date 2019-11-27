<?php

namespace App\Models\HR;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Notifications\Notifiable;
class PersonalInfo extends Model
{
    protected $table = 'personal_infos';
    protected $primaryKey = 'personal_info_id';

    use Notifiable;
    use SearchableTrait;

    protected $searchable = [
        'columns' => [
            'personal_infos.name'  => 10,
            'personal_infos.mobile_number'   => 10,
            'personal_infos.education_qualification'   => 10,
            'personal_infos.religion'    => 10,
            'personal_infos.marital_status'  => 10,
            'personal_infos.personal_info_id'    => 10,
        ]
    ];

    









    public function permanentAddress()
    {
    	return $this->hasOne('App\Models\HR\PermanentAddress', 'personal_info_id','personal_info_id');
    }

    public function presentAddress()
    {
    	return $this->hasOne('App\Models\HR\PresentAddress', 'personal_info_id','personal_info_id');
    }

    public function emergencyCommunicationAddress()
    {
    	return $this->hasOne('App\Models\HR\EmergencyCommunicationAddress', 'personal_info_id','personal_info_id');
    }

    public function jobInformation()
    {
        return $this->hasOne('App\Models\HR\JobInfo', 'personal_info_id','personal_info_id');
    }

    public function extraInformation()
    {
        return $this->hasOne('App\Models\HR\ExtraInfo', 'personal_info_id','personal_info_id');
    }

     


   
}
