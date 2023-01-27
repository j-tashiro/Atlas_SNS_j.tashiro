<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//2022.12.16
use App\Post;

//下記の内容を追記する
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    //
    //2022.12.16 postsテーブルのつぶやきをすべて表示させる
    //CRUDのrに当たるread処理を行ってる
    //21行目の$listと22行目の$listが連動してる
    public function read()
    {
        $list = Post::get();
        return view('posts.index',['post'=>$list]);
    }

    // 2022.11.12 投稿フォーム用メソッド
    //ログインしてるユーザー(id)と
    //新しく投稿するものを紐づける必要がある
    //CRUDのCに当たるcreate処理を行ってる
    public function create(Request $request)
    {
        $post = $request->input('newPost');
    //2022.11.14 わからなかった所
        $id = Auth::id();
        Post::insert([
            'post' => $post,
    //2022.11.14 わからなかった所
            'user_id' => $id,
        ]);

        return redirect('top');
    }

    //2023.01.16 ログインユーザーのつぶやきを編集
    public function update(Request $request)
    {
        // 1つ目の処理
        $id = $request->input('id');
        $up_post = $request->input('upPost');
        // 2つ目の処理
        Post::where('id', $id)->update(['post' => $up_post]);
        // 3つ目の処理
        return redirect('top');
    }

    //2022.12.23 削除用メソッド
    public function delete($id)
    {
        Post::where('id', $id)->delete();
        return redirect('top');
    }
}
