<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use \App\Models\Image;
use \App\Models\Icon;
use Illuminate\Routing\Controller as BaseController;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function getPosts() {
        $icons = Icon::orderBy('id')->get();
        $images = Image::orderBy('id', 'desc')->paginate(4);
        return view('dashboard',[
            'images' => $images,
            'icons' => $icons
        ]);
        
    }
}
