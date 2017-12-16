<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class Phone_company extends Model
{

	public static $rules = array(
        'title' => 'required|unique:phone_companies|max:255',
        'icon' => 'required'
    );
	public function phone_companies()
	{
		return $this->hasMany('App\Model\User\Phone');
	}
    protected $guarded = array();
}
