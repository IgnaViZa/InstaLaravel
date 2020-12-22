<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Image extends Model
{
    use HasFactory;
    protected $table = 'images';
    
    //Relacion One To Many (One Image Contain Many Commets)
    public function comments(){
        return $this->hasMany('App\Models\Comment')->orderBy('id', 'Desc');
    }
    
    //Relacion One To Many (One Image Contain Many Likes)
    public function likes(){
        return $this->hasMany('App\Models\Like');
    }

    //Relacion Many To One(Many Images Belong To One User)
    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }
}
