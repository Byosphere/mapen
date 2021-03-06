<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function(){

	return redirect('home');
});

Route::get('home', 'HomeController@index');

Route::get('articles/liste', 'Articles\ArticleController@liste');

Route::group(['prefix'=> 'articles', 'middleware'=> 'auth'], function(){

	Route::get('write/{id?}', 'Articles\ArticleController@write');
	Route::post('create', 'Articles\ArticleController@create');
	Route::get('{id}/mylist', 'Articles\ArticleController@userList');
	Route::post('modify/{id}', 'Articles\ArticleController@modify');

});
Route::get('like', 'LikeController@like');

Route::get('article/{id}/{slug}', 'Articles\ArticleController@index');
Route::get('article/delete/{id}/{slug}', 'Articles\ArticleController@delete');


Route::get('user/{id}', 'Users\UsersController@index');
Route::get('user/{id}/ban/{bool}', 'Users\UsersController@ban');
Route::post('user/{id}/geoloc', 'Users\UsersController@geoloc');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::resource('profilePicture', 'ProfilePictureController', ['except'=>['index','show']]);

