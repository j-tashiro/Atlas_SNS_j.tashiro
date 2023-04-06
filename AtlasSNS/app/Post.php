<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// class Post extends Modelのclass PostとPostsController.phoのuse App\Post;のPostを
// 同じにすることでリンクされテーブルの情報を受け取れるようになる
class Post extends Model
{
    //2023.04.05 追加
    // ->belongsTo 多(postsテーブル)対一(usersテーブル)
    public function user()
{
    return $this->belongsTo('App\User');
}


}
