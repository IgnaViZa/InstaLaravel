<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;

class LikeController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function like($image_id) {
        //dates user and image
        $user = \Auth::user();


        //Already exist
        $isset_like = Like::where('user_id', $user->id)//user_id = $user->id
                ->where('image_id', $image_id)//image_id = $image_id
                ->count(); //getting result
        if ($isset_like == 0) {
            $like = new Like();

            $like->user_id = $user->id;
            $like->image_id = (int) $image_id;

            //save
            $like->save();
            //Return a Json array
            return redirect()->route('posts');
            /*response()->json([
                'like' => $like
             ]);*/
        } else {
            return redirect()->route('posts');
            /*response()->json([
                'message' => 'Ya existe'
            ]);*/
        }
    }

    public function dislike($image_id) {
        //dates user and image
        $user = \Auth::user();


        //Already exist
        $like = Like::where('user_id', $user->id)//user_id = $user->id
                ->where('image_id', $image_id)//image_id = $image_id
                ->first(); //get 1 result
        if ($like) {
            //Eliminar Like
            $like->delete();
            //Return a Json array
            return redirect()->route('posts');
            /*response()->json([
                'like' => $like,
                'message' => 'Dislikeado'
            ]);*/
        }else {
            return redirect()->route('posts'); 
            /*response()->json([
                'message' => 'El like no existe'
            ]);*/
        }
    }

}
