<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\User;

class UserController extends Controller
{
    
    public function __construct() {
        $this->middleware('auth');
    }
    
        public function config() {
            return view('user.config');
            
        }
        
        public function update(Request $request){
            //Identificate user
            $user = \Auth::user();
            $id = $user->id;
            //Validations
            $request->validate([
                'name' => 'required|string|max:255',
                'surname' => 'required|string|max:255',
                'nick' => 'required|string|max:255|unique:users,nick,'.$id,
                'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            ]);
            //Asign values to a user object
            $user->name = $request->name;
            $user->surname = $request->surname;
            $user->nick = $request->nick;
            $user->email = $request->email;
            //Upload image
            $image_path = $request->file('image_path');
            if ($image_path){
                //unique name
                $image_path_name = time().$image_path->getClientOriginalName();
                //Save into disk =carpet storage users (storage/app/users)
                Storage::disk('users')->put($image_path_name, File::get($image_path));
                //Set name into user object 
                $user->image = $image_path_name;
            }
            //Update sql
            $user->update();
            
            return redirect()->route('config')
                             ->with(['msg' => 'Usuario actualizado correctamente']);
            
            
        }
        
        public function getProfile($id) {
            $user = User::find($id);
            return view('user.perfil', ['user' => $user]);
        }
        
        public function getImage($filename) {
            $file = Storage::disk('users')->get($filename);
            return new Response($file, 200);
        }
}
