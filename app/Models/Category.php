<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;



    public function posts()
    {
        //hasOne, hasMany, belongsTo, belongsToMany
        return $this->hasMany(Post::class);

    }

    public function products()
    {
        //hasOne, hasMany, belongsTo, belongsToMany
        return $this->hasMany(Product::class);

    }

    public function brands()
    {
        return $this->hasMany(Brand::class);
    }

}
