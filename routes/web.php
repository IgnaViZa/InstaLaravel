<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
Route::get('/getPosts','App\Http\Controllers\Controller@getPosts')->name('posts');
Route::get('/post/{filename?}','App\Http\Controllers\ImageController@getAllImages')->name('postImage');
Route::get('/icon/{iconname?}','App\Http\Controllers\ImageController@getIcons')->name('getIcon');
Route::get('/detail/{id}','App\Http\Controllers\ImageController@detail')->name('detail');
Route::get('/user/avatar/{filename?}','App\Http\Controllers\UserController@getImage')->name('user.avatar');
Route::get('/create','App\Http\Controllers\ImageController@create')->name('create');
Route::get('/configuracion','App\Http\Controllers\UserController@config')->name('config');
Route::post('/update','App\Http\Controllers\UserController@update')->name('update');
Route::post('/subir-imagen','App\Http\Controllers\ImageController@save')->name('save');
Route::post('/store','App\Http\Controllers\CommentController@store')->name('store');
Route::get('/delete/{id}','App\Http\Controllers\CommentController@delete')->name('delete');
Route::get('/like/{image_id}/{from}','App\Http\Controllers\LikeController@like')->name('like.save');
Route::get('/dislike/{image_id}/{from}','App\Http\Controllers\LikeController@dislike')->name('like.delete');
Route::get('/likes','App\Http\Controllers\LikeController@postLikes')->name('likes');
