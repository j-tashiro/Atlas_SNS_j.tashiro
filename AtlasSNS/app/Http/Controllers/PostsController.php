<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// 9行目のPostとPost.phpの9行目のclass Postを
// 同じにすることでリンクされテーブルの情報を受け取れるようになる
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
        $id = Auth::id();
        Post::insert([
            'post' => $post,
            'user_id' => $id,
        ]);

        return redirect('top');
    }

    //2023.01.16 ログインユーザーのつぶやきを編集
    public function update(Request $request)
    {
        $id = $request->input('id');
        $up_post = $request->input('upPost');
        Post::where('id', $id)->update(['post' => $up_post]);
        return redirect('top');
    }

    //2022.12.23 削除用メソッド
    public function delete($id)
    {
        Post::where('id', $id)->delete();
        return redirect('top');
    }
}
