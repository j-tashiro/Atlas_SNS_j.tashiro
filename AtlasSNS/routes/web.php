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

//ページを表示させるのがget
//登録処理をするのがpost

//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');


Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ログイン中のページ
//2022.12.16 ログインユーザーのフォローのつぶやきを表示
Route::get('/top','PostsController@read');

Route::get('/profile','UsersController@profile');

//2023.02.07 検索入力フォームの設置
Route::get('/search','UsersController@search');
Route::post('/search','UsersController@search');

Route::get('/follow-list','PostsController@index');
Route::get('/follower-list','PostsController@index');

// 2022.11.02 ログアウト
Route::get('/logout','Auth\LoginController@logout');

//2022.11.12 投稿フォーム
Route::get('/posts/create','PostsController@create');
Route::post('/posts/create','PostsController@create');

//2023.01.16 ログインユーザーのつぶやきを編集
Route::post('/post/update', 'PostsController@update');

//2022.12.23 削除用メソッド
Route::get('/post/{id}/delete','PostsController@delete');


