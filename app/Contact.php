<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
	protected $casts = [
        'worktime' => 'array',
    ];

    public function personals()
    {
        return $this->belongsToMany(\App\Personal::class, 'personal_contacts');
    }    //
}
