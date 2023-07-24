<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'user_id', 'brand_id', 'price', 'image', 'slug', 'category_id'];

    protected $with = ['category','author'];

    public function category()
    {
        //hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Category::class);

    }

    // public function user()
    // {
    //     //hasOne, hasMany, belongsTo, belongsToMany
    //     return $this->belongsTo(User::class);

    // }

    public function author()
    {
        //hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(User::class, 'user_id');

    }
}
