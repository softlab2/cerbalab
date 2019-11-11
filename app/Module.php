<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
	protected $table = 'sd_modules';
	public $timestamps = false;	

    public function policies()
    {
        return $this->hasMany('App\ModulePolicy');
    }
}
