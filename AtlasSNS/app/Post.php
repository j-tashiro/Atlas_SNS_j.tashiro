<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// 9行目のclass PostとPostsController.phoの9行目のPostを
// 同じにすることでリンクされテーブルの情報を受け取れるようになる
class Post extends Model
{
    //2023.04.05 追加
    public function user()
{
    return $this->belongsTo('App\User');
}


}
