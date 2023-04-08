<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use App\Post;のPostとPost.phpの9行目のclass Postを
// 同じにすることでリンクされテーブルの情報を受け取れるようになる
use App\Post;

// 2023.04.01 Auth::userを起動させるために必要な記述
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    //use App\Post;のPostとPost::のPostが連動している
    public function read()
    {
        $list = Post::get();
        return view('posts.index',['post'=>$list]);
    }

    // ログインしてるユーザー(id)と新しい投稿(post)を紐づける必要がある
    public function create(Request $request)
    {
        // Auth::user()->idとAuth::id()は同じ意味 Auth::id()は省略型
        // Auth::はログインしてるユーザーの情報が取れる この場合はログインしてるユーザーのidが取れる
        $id = Auth::id();//Auth::id();のidの部分はidしか省略できない
        $post = $request->input('newPost');
        Post::insert(['post' => $post,'user_id' => $id,]);
        return redirect('top');
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $post = $request->input('upPost');
        // Post::where('id','=', $id)の=は省略できる
        Post::where('id','=', $id)->update(['post' => $post]);
        return redirect('top');
    }

    public function delete($id)
    {
        Post::where('id', $id)->delete();
        return redirect('top');
    }


}
