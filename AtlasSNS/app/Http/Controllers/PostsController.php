<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//下記の内容を追記する
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    //
    public function index(){
        return view('posts.index');
    }

    // 2022.11.12 投稿フォーム用メソッド
    //ログインしてるユーザー(id)と
    //新しく投稿するものを紐づける必要がある
    public function create(Request $request)
    {
        $post = $request->input('newPost');
    //2022.11.14 わからなかった所
        $id = Auth::id();
        \DB::table('posts')->insert([
            'post' => $post,
    //2022.11.14 わからなかった所
            'user_id' => $id,
        ]);

        return redirect('top');
    }
}
