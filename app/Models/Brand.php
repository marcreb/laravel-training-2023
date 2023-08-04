<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use Sluggable;
    use HasFactory;
    protected $guarded = [];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // public function products()
    // {
    //     //hasOne, hasMany, belongsTo, belongsToMany
    //     return $this->hasMany(Product::class);

    // }

    public function products()
    {
        //hasOne, hasMany, belongsTo, belongsToMany
        //return $this->belongsToMany(Product::class)->withTimestamps();
        return $this->belongsToMany(Product::class,'product_brand');

    }
    public function categories()
    {
        // return $this->belongsToMany(Category::class, 'brand_category')->withTimestamps();
          return $this->belongsToMany(Category::class, 'brand_category')->withTimestamps();
    }

}
