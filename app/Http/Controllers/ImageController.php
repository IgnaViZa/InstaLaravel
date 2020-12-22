<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function create() {
        return view('image.create');
    }

    public function save(Request $request) {
        //Validation
        $validate = $this->validate($request, [
            'imagen_path' => 'required|Image'
        ]);

        $image_path = $request->file('imagen_path');
        $description = $request->descripcion;

        //Asig values
        $image = new Image();
        $user = \Auth::user();
        $image->user_id = $user->id;
        $image->description = $description;

        //Upload img
        if ($image_path) {
            //unique name
            $image_path_name = time() . $image_path->getClientOriginalName();
            //Save into disk =carpet storage users (storage/app/users)
            Storage::disk('images')->put($image_path_name, File::get($image_path));
            //Set name into user object 
            $image->image_path = $image_path_name;
        }
        
        $image->save();
        
        return redirect()->route('posts')->with([
           'msg' => 'La foto se ha posteado correctamente' 
        ]);
    }
    
    public function getAllImages($filename){
        $file = Storage::disk('images')->get($filename);
        return new Response($file, 200);
    }
    
    public function getIcons($iconname){
        $file = Storage::disk('images')->get($iconname);
        return new Response($file, 200);
    }
    
    public function detail($id){
        $image = Image::find($id);
        
        return view('image.detail',[
            'image' => $image
        ]);
    }
}
