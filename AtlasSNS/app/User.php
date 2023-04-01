<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

// 10行目のUserとUsersControllerのUserを
// 同じ名前にすることでテーブルがリンクされ情報を受け取れるようになる
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

// 2023.03.10 リレーションテーブル同士を連結させる
// 今回のフォロー機能はユーザーがユーザーをフォローする関係だからuserテーブル同士でリレーションする
// 多対多 リレーション https://qiita.com/ramuneru/items/db43589551dd0c00fef9
// Laravel belongsToMany https://solomaker.club/how-to-use-laravel-orm-belongs-to-many/
// 第一引数 連結させるモデル名 User::class
// 第二引数 中間テーブルにするテーブル名 follows
// 第三引数 カラム名 followed_id following_id
// 第四引数 カラム名 following_id followed_id

// フォロワー達=フォローしてくれてる人達
// 第3引数はフォローしてくれてる人のIDが欲しい
// 第4引数は自分のID
public function followers()
{
    return $this->belongsToMany(User::class, 'follows', 'followed_id', 'following_id');
}

// フォローする
// 第3引数は自分のID
// 第4引数はフォローしたい人のID
public function follows()
{
    return $this->belongsToMany(User::class, 'follows', 'following_id', 'followed_id');
}



// 2023.03.10 フォローボタン
// フォローする Intは整数 attachは付け足す
public function follow(Int $id)
{
    return $this->follows()->attach($id);
}

// フォロー解除する detachは切り離す
public function unfollow(Int $id)
{
    return $this->follows()->detach($id);
}

// フォローしているか
public function isFollowing(Int $id)
{
    return (boolean) $this->follows()->where('followed_id', $id)->first(['follows.id']);
}

// フォローされているか
public function isFollowed(Int $id)
{
    return (boolean) $this->followers()->where('following_id', $id)->first(['follows.id']);
}



}


