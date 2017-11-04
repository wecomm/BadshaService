<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    public function repairs()
    {
    	return $this->hasMany('App\Model\User\Repair_type');
    }
}
