<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    //protected $guarded = ['id'];
    protected $fillable = ['title', 'excerpt', 'body', 'slug', 'category_id'];

    // public function getRouteKeyName() // Use this if you dont want to have  Route::get('/posts/{post:slug}', and jsut use Route::get('/posts/{post}'
    // {
    //     return 'slug';
    // }

    public function category()
    {
        //hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Category::class);

    }

    public function user()
    {
        //hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(User::class);

    }
}
