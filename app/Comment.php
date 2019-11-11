<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    public function scopeApproved($query){
    	return $query->whereApproved(1);
    }
}
