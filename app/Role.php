<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $table = 'roles';

	public $timestamps = false;
	
	public function users()
	{
		return $this->belongsToMany('User', 'users_roles');
	}    //

	public function getDiscount(){
		return $this->discount;
	}
}
