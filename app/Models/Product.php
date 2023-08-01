<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'user_id', 'brand_id', 'price', 'image', 'slug', 'category_id'];

    protected $with = ['category','author'];

    public function scopeFilter($query, array $filters)
    {

        $query->when($filters['search'] ?? false, fn($query, $search) =>
        $query
            ->where('name', 'like', '%' . $search . '%')

        );

        $query->when($filters['brand'] ?? false, fn($query, $brand) =>
            $query->whereHas('brand', fn ($query) =>
                $query->where('slug', $brand))
        );

        $query->when($filters['category'] ?? false, function ($query, $category) {
            $query->where('category_id', $category);
        });

    }

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

    public function brand()
    {
        //hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Brand::class, 'brand_id');

    }

    public function reviews()
    {
        //hasOne, hasMany, belongsTo, belongsToMany
        return $this->hasMany(Review::class);

    }
}
