<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
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

    // protected $guarded = [];

    protected $fillable = [
        'name', 'slug', 'parent_id'
    ];

    public function posts()
    {

        return $this->hasMany(Post::class);

    }

    public function products()
    {
        //hasOne, hasMany, belongsTo, belongsToMany
        // return $this->belongsToMany(Product::class)->withTimestamps();
        return $this->belongsToMany(Product::class,'product_category');

    }

    public function brands()
    {
        return $this->belongsToMany(Brand::class);
    }

    // Define the self-referential relationship for child categories
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }


    public function getRelatedCategoryIds()
    {
        $relatedCategoryIds = collect([$this->id]);

        if ($this->children->isNotEmpty()) {
            $relatedCategoryIds = $relatedCategoryIds->concat(
                $this->children->pluck('id')
            );
        }

        return $relatedCategoryIds;
    }
    // public function products()
    // {
    //     //hasOne, hasMany, belongsTo, belongsToMany
    //     return $this->hasMany(Product::class);

    // }
        // public function brands()
    // {
    //     return $this->hasMany(Brand::class);
    // }
}
