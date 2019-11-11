<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	use \Cviebrock\EloquentSluggable\Sluggable;
    use \Kalnoy\Nestedset\NodeTrait;

    protected $table = 'categories';

	/**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function sub(){
    	return Category::hasMany('\App\Category', 'parent_id');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product', 'product_categories');
    }
}
