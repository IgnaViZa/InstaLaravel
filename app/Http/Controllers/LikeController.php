<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;

class LikeController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function like($image_id,$from) {
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
            if ($from =='dashboard'){
                return redirect()->route('posts');
            }else{
                return redirect()->route('detail',['id'=>$like->image_id]);    
            }
            /*response()->json([
                'like' => $like
             ]);*/
        } else {
            if ($from == 'dashboard'){
                return redirect()->route('posts');
            }else{
                return redirect()->route('detail',['id'=>$like->image_id]);    
            }
            /*response()->json([
                'message' => 'Ya existe'
            ]);*/
        }
    }

    public function dislike($image_id,$from) {
        //dates user and image
        $user = \Auth::user();


        //Already exist
        $like = Like::where('user_id', $user->id)//user_id = $user->id
                ->where('image_id', $image_id)//image_id = $image_id
                ->first(); //get 1 result
        if ($like) {
            //Eliminar Like
            $like->delete();
            if ($from == 'dashboard'){
                return redirect()->route('posts');
            }else{
                return redirect()->route('detail',['id'=>$like->image_id]);    
            }
            /*response()->json([
                'like' => $like,
                'message' => 'Dislikeado'
            ]);*/
        }else {
            if ($from =='dashboard'){
                return redirect()->route('posts');
            }else{
                return redirect()->route('detail',['id'=>$like->image_id]);    
            } 
            /*response()->json([
                'message' => 'El like no existe'
            ]);*/
        }
    }
    
    public function postLikes(){
        $user = \Auth::user();
        $likes = Like::where('user_id', $user->id)
                        ->orderBy('id', 'desc')
                        ->paginate(3);
        
        return view('like.likes',[
            'likes' => $likes
        ]);
    }

}
