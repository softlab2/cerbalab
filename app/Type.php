<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'types';

    public function tabs(){
    	return $this->hasMany(\App\TypeTab::class, 'type_id');
    }

    public function items(){
    	return $this->hasMany(\App\TypeItem::class, 'type_id');
    }
}
