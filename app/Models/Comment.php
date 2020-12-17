<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';

    //Relacion Many To One(Many Commets Belong To One User)
    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }
    
    //Relacion Many To One(Many Commets Belong To One Image)
    public function image(){
        return $this->belongsTo('App\Models\Image','image_id');
    }
}
