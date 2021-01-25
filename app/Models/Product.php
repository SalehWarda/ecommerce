<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use Translatable,
    SoftDeletes;


    protected $with = ['translations'];


    protected $translatedAttributes = ['name','description','short_description'];



    protected $fillable = [

        'brand_id',
        'slug',
        'price',
        'special_price',
        'special_price_type',
        'special_price_start',
        'special_price_end',
        'selling_price',
        'sku',
        'manage_stock',
        'qty',
        'in_stock',
        'is_active'

    ];


    protected $hidden = ['translations'];

    protected $casts = [

        'in_stock' => 'boolean',
        'manage_stock' => 'boolean',
        'is_active' => 'boolean',
    ];

    protected $date = [

        'special_price_start',
        'special_price_end',
        'start_date',
        'end_date',
        'deleted_at',

    ];



    public function getActive(){

        return $this->is_active == 0 ? 'Not Active' : 'Active' ;

    }

    public function getPhotoAttribute($val){

        return ($val !== null) ? asset('assets/admin/images/brands/' . $val) : "";
    }

    public function brand()
    {
        return $this->belongsTo('App\Models\Product', 'brand_id', 'id')->withDefault();
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'product_categories', 'product_id', 'categories_id');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'product_tags', 'product_id', 'tags_id');
    }
}
