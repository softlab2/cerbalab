<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reception extends Model
{
    public function personal()
    {
        return $this->belongsTo(\App\Personal::class, 'personal_id');
    }
    //
}
