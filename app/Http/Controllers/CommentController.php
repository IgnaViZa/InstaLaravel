<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function  store(Request $request){
        $image_id = $request->image_id;
        $content = $request->content;
        $user= \Auth::user();
        //Object Commet
        $commet = new Comment();
        $commet->user_id = $user->id;
        $commet->image_id = $image_id;
        $commet->content = $content;
        
        //save
        $commet->save();
        
        
        return redirect()->route('detail',['id' => $image_id])->with(['msg' => 'Comentario Archivado']);
    }
    
    public function delete($id){
        $user = \Auth::user();
        
        //Find the object in the db
        $comment = Comment::find($id);
        
        if ($user && ($comment->user_id == $user->id || $comment->image->user_id == $user->id )){
            $comment->delete();
        
            return redirect()->route('detail',['id' => $comment->image->id])->with(['msg' => 'Comentario Eliminado']);
        }else{
            return redirect()->route('detail',['id' => $comment->image->id])->with(['msg' => 'Error Al Eliminado']);
        }
        
    }
}
