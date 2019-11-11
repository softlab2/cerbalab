<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kkt extends Model
{
    protected $table = 'kkt';

	protected $casts = [
        'options' => 'array',
    ];

}
