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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login')->name('login');

Route::get('/register', 'Auth\RegisterController@registerForm');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

Route::get('/logout', 'Auth\LoginController@logout');


//ログイン中のページ
Route::get('/top','PostsController@index');

//ツイート投稿
Route::post('top', 'PostsController@create');

//ツイート編集
Route::get('top/{id}','PostsController@updateForm');
Route::post('top/update','PostsController@update');

//ツイート削除
Route::get('top/{id}/delete','PostsController@delete');

Route::get('/profile','UsersController@profile');
Route::resource('profile', 'UsersController', ['only' => ['edit','update']]);


Route::get('search','UsersController@search');
Route::post('search/{id}', 'UsersController@follow')->name('follow');
Route::delete('search/{id}', 'UsersController@unfollow')->name('unfollow');

// フォローリスト/フォロワーリスト

Route::get('/followList', 'FollowsController@followList');
Route::get('/followerList', 'FollowsController@followerList');
