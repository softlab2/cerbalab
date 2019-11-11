<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	use \Cviebrock\EloquentSluggable\Sluggable;

    protected $table = 'products';

    protected $casts = [
        'tabs' => 'array',
        'items' => 'array',
        'services' => 'array',
        'pdfs'=>'array'
    ];

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

    public function getPrice(){
        if(!auth()->user()){
            return $this->price;
        }else{
            if($discount = auth()->user()->getDiscount()){
                $discountPrice = $this->price - $this->price/100*$discount;
                return ceil($discountPrice/10)*10;
            }else{
                return $this->price;
            }
        }
    }
    //
    public function type()
    {
        return $this->belongsTo(\App\Type::class, 'type_id');
    }    //

    public function categories()
    {
        return $this->belongsToMany(\App\Category::class, 'product_categories');
    }    //

    // public function services()
    // {
    //     return $this->belongsToMany(\App\Service::class, 'product_services');
    // }    //

    public function actions()
    {
        return $this->belongsToMany(\App\Action::class, 'action_products');
    }    //

    public function comments()
    {
        return $this->hasMany(\App\Comment::class, 'product_id');
    }    //
}
