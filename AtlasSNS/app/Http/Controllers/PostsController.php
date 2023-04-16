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
        $post = Post::get()->sortByDesc('created_at');
        return view('posts.index',['posts'=>$post]);
    }

    // ログインしてるユーザー(id)と新しい投稿(post)を紐づける必要がある
    public function create(Request $request)
    {
        // Auth::user()->idとAuth::id()は同じ意味 Auth::id()は省略型
        // Auth::はログインしてるユーザーの情報が取れる この場合はログインしてるユーザーのidが取れる
        $id = Auth::id();//Auth::id();のidの部分はidしか省略できない
        $new_Post = $request->input('newPost');
        Post::insert(['user_id' => $id,'post' => $new_Post]);
        return redirect('top');
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $update_Post = $request->input('updatePost');
        // Post::where('id','=', $id)の=は省略できる
        Post::where('id','=', $id)->update(['post' => $update_Post]);
        return redirect('top');
    }

    public function delete($id)
    {
        Post::where('id', $id)->delete();
        return redirect('top');
    }


}
