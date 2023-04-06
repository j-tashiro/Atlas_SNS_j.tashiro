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

//ページを表示させるのがget Controllerの処理をがviewで終わる
// 本来の意味は「このページをくれよ」なお願い
// getでパスワードなどのやりとりをするとURLに表示される可能があるのでpostがおすすめ

//登録処理や更新処理をするのがpost Controllerの処理がredirectで終わる
// 本来の意味は「このデータをやるから追加しとけ」なお願い


//ログアウト中のページ
// 2023.03.17 AuthでKernel.phpの55行目に移動
Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

// 2022.11.02 ログアウト
Route::get('/logout','Auth\LoginController@logout');
Route::post('/logout','Auth\LoginController@logout');

//ログイン中のページ

Route::group(['middleware' => 'auth'], function() {
//2022.12.16 ログインユーザーのフォローのつぶやきを表示
Route::get('/top','PostsController@read');

//2022.11.12 投稿フォーム
Route::get('/post/create','PostsController@create');
Route::post('/post/create','PostsController@create');

//2023.01.16 ログインユーザーのつぶやきを編集
Route::post('/post/update', 'PostsController@update');

//2022.12.23 削除用メソッド
Route::get('/post/{id}/delete','PostsController@delete');

//2023.02.07 検索入力フォームの設置
Route::get('/search','UsersController@search');
Route::post('/search','UsersController@search');

// 2023.04.06 フォローリスト
Route::get('/follow-list','FollowsController@followList');

// 2023.04.06 フォロワーリスト
Route::get('/follower-list','FollowsController@followerList');

// 2023.04.06 他ユーザープロフィール
Route::get('/user/{id}','FollowsController@user');

// 2023.03.21 プロフィール表示
Route::get('/profile','UsersController@profile');

// 2023.03.22 プロフィール編集
Route::get('/profile/update','UsersController@update');
Route::post('/profile/update','UsersController@update');







// 2023.03.10 フォローボタン
// ログイン状態

// ユーザ関連
Route::resource('users', 'UsersController', ['only' => ['index', 'show', 'edit', 'update']]);

// フォロー/フォロー解除を追加
Route::post('/users/{id}/follow', 'UsersController@follow')->name('follow');
Route::get('/users/{id}/follow', 'UsersController@follow')->name('follow');
Route::delete('/users/{id}/unfollow', 'UsersController@unfollow')->name('unfollow');
Route::get('/users/{id}/unfollow', 'UsersController@unfollow')->name('unfollow');

});