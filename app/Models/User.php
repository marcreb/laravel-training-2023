<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'user_role', 'profile_pict'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($password) // MUTATOR setUsernameAttribute() para gumana ung set attribute
    {
        $this->attributes['password'] = bcrypt($password);

    }

    // public function getUsernameAttribute($username) // accessor inverse ng set**Attribute
    // {
    //    return ucwords($username); //sets the format of the field when saving

    // }
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

}
