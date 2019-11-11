<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{

    public function items()
    {
        return $this->hasMany(\App\SliderItem::class, 'slider_id');
    }    //
}
