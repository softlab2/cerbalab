<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModulePolicy extends Model
{
	protected $table = 'sd_module_policies';
	public $timestamps = false;	
	protected $casts = [
        'policies' => 'array',
    ];
}
