<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
	use \Cviebrock\EloquentSluggable\Sluggable;

    protected $table = 'pages';

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
