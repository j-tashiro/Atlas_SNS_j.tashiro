<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// 9行目のclass PostとPostsController.phoの9行目のPostを
// 同じにすることでリンクされテーブルの情報を受け取れるようになる
class Post extends Model
{
    //2023.04.02 投稿(postテーブル)とユーザー(userテーブル)をリレーション
    public function userPost()
{
    return $this->belongsToMany(User::class, 'follows', 'followed_id', 'following_id');
}

}
