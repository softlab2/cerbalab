<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Ixudra\Imageable\Models\Image;
use Ixudra\Imageable\Traits\ImageableTrait;

class Action extends Model
{
    use ImageableTrait;

    protected $imagePath = 'images/actions';

	public function image()
    {
        return $this->morphOne( Image::class, 'imageable' );
    }


    public function delete()
    {
        $this->image->delete();

        parent::delete();
	}

    public function products()
    {
        return $this->belongsToMany('App\Product', 'action_products');
    }
}
