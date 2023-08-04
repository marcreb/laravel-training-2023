<?php

namespace App\Models;
use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Brand;
class Product extends Model
{
    use Sluggable;
    use HasFactory;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }


     protected $fillable = ['name', 'user_id', 'brand_id', 'price', 'image', 'slug'];
    // protected $guarded = [];

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
            $query->whereHas('category', function ($query) use ($category) {
                $query->where('slug', $category);
            });
        });
    }

    public function category()
    {
        //hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsToMany(Category::class,  'product_category');

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
        return $this->belongsToMany(Brand::class, 'product_brand');

    }

    public function reviews()
    {
        //hasOne, hasMany, belongsTo, belongsToMany
        return $this->hasMany(Review::class);

    }

    public function categories()
    {
        return $this->belongsToMany(Category::class,'product_category')
            ->orderBy('categories.id', 'asc');
    }

    public function brands()
    {
        return $this->belongsToMany(Brand::class,'product_brand');
    }
}
