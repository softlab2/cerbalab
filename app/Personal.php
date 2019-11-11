<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
	use \Cviebrock\EloquentSluggable\Sluggable;

	/**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function contacts()
    {
        return $this->belongsToMany(\App\Contact::class, 'personal_contacts');
    }    //
}
