<?php

namespace App\Models\HR;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
class JobInfo extends Model
{
    protected $table = 'job_infos';
    protected $primaryKey = 'job_info_id';

	
}
