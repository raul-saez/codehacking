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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/post/{id}', ['as'=>'home.post', 'uses'=>'AdminPostsController@post']);
// Route::get('/admin', function(){
//     return view('admin.index');
// });
Route::resource('/users/posts', 'AdminPostsController');
Route::resource('/users/categories', 'AdminCategoriesController');
Route::resource('/users/media', 'AdminMediaController');
Route::resource('/users/comments', 'PostCommentsController');
Route::resource('/users/comments/replies', 'CommentRepliesController');

Route::group(['middleware'=>'admin'], function(){
    Route::get('/admin', function(){
        return view('admin.index');
    });
    Route::resource('/users', 'AdminUsersController');
    Route::resource('/users/posts', 'AdminPostsController');
    Route::resource('/users/categories', 'AdminCategoriesController');
    Route::resource('/users/media', 'AdminMediaController');
    Route::resource('/users/comments', 'PostCommentsController');
    Route::resource('/users/comments/replies', 'CommentRepliesController');
});

Route::group(['middleware'=>'auth'], function(){
    Route::post('/comments/reply', 'CommentRepliesController@createReply');

});