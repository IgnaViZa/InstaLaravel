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
    //Campos que se llenan de la tabla
    protected $fillable = [
        'role',
        'name',
        'surname',
        'nick',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    //Relacion One To Many (One User Contain Many Images)
    public function images(){
        return $this->hasMany('App\Models\Image');
    }
    
    //Relacion One To Many (One User Contain Many Cooments)
    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }
    
    //Relacion One To Many (One Image Contain Many Likes)
    public function likes(){
        return $this->hasMany('App\Models\Like');
    }
}
