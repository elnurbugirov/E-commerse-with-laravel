<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/logout','Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/post/{id}',['as' => 'home.post','uses'=> 'AdminPostsController@post']);

Route::group(['middleware' => 'admin'], function (){
    Route::get('/admin',function (){
        return view('admin.index');
    });

    Route::resource('admin/users','AdminUsersController');
    Route::resource('admin/posts','AdminPostsController');
    Route::resource('admin/categories','AdminCategoriesController');
    Route::resource('admin/media','AdminMediasController');
    Route::resource('admin/comments','PostsCommentController');
    Route::resource('admin/comment/replies','CommentRepliesController');
});

Route::group(['middleware' => 'auth'], function (){
    Route::post('comment/reply','CommentRepliesController@createReply');

});
