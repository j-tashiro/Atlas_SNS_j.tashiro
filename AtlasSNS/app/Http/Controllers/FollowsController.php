<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Post;
// 2023.04.01 Auth::userを起動させるために必要な記述
use Illuminate\Support\Facades\Auth;

class FollowsController extends Controller
{
    // 2023.04.05 フォローリスト
    public function followList()
    {
        // 2023.04.05 フォローしているユーザーのidを取得
        // https://takuma-it.com/laravel-pluck/
        // https://course.lull-inc.co.jp/curriculum/7821/
        $following_id = Auth::user()->follows()->pluck('followed_id');

        // 2023.04.05 フォローしているユーザーのidを元に投稿内容を取得
        // https://qiita.com/miriwo/items/553dccbae72a25b5467b
        // Post::with('user')のuserはPost.phpのuserメソッドと連動している
        // ->whereIn('user_id', $following_id)は
        // 全てのid(user_id)とフォローしてるid($following_id)のなかで被ってるidだけgetしてる
        $posts = Post::with('user')->whereIn('user_id', $following_id)->get();
        $users = User::whereIn('id', $following_id)->get();
        return view('follows.followList',['users'=>$users,'posts'=>$posts]);
    }

    // 2023.04.06 フォロワーリスト
    public function followerList()
    {
        $followed_id = Auth::user()->followers()->pluck('following_id');
        $posts = Post::with('user')->whereIn('user_id', $followed_id)->get();
        $users = User::whereIn('id', $followed_id)->get();
        return view('follows.followerList',['users'=>$users,'posts'=>$posts]);
    }

    // 2023.04.06 他ユーザープロフィール
    public function userProfile($id)
    {
        // ->get();は繰り返す時(foreach)に使う
        // ->first();は単体で表示する時に使う
        $user = User::where('id', $id)->first();
        $post = Post::with('user')->where('user_id', $id)->get();
        return view('follows.userProfile',['user'=>$user,'posts'=>$post,]);
    }
}
