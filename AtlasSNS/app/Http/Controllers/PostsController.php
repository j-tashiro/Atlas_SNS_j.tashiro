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
    //9行目のPostと21行目のPostが連動している
    public function read()
    {
        $list = Post::get();
        return view('posts.index',['post'=>$list]);
    }

    // ログインしてるユーザー(id)と新しい投稿(post)を紐づける必要がある
    //
    // 30行目のRequest $requestはindex.blade.phpの
    // /posts/createからweb.phpを通してデータをまるまる受け取ってる

    public function create(Request $request)
    {
        $post = $request->input('newPost');
        // Auth::user()->idとAuth::id()は同じ意味 Auth::id()は省略型
        // Auth::はログインしてるユーザーの情報が取れる この場合はログインしてるユーザーのidが取れる
        $id = Auth::id();//Auth::id();のidの部分はidしか省略できない
        // ddとはデバック関数である 変数に何が入ってるか確認できる
        // dd($id);
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
        // 52行目の=は省略できる ->updateの->の部分にもしっかり意味がある
        Post::where('id','=', $id)->update(['post' => $up_post]);
        return redirect('top');
    }

    //2022.12.23 削除用メソッド
    public function delete($id)
    {
        // 60行目には=が省略されてる ->deleteの->の部分にもしっかり意味がある
        Post::where('id', $id)->delete();
        return redirect('top');
    }


}
