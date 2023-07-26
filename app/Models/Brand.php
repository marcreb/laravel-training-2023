<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function products()
    {
        //hasOne, hasMany, belongsTo, belongsToMany
        return $this->hasMany(Product::class);

    }
}
