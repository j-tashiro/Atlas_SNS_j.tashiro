<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// 9行目のUserとUser.phpの10行目のclass Userを
// 同じ名前にすることでテーブルがリンクされ21行目のUser::が情報を受け取れるようになる
use App\User;


class UsersController extends Controller
{
    public function profile(){
        return view('users.profile');
    }
    // 2023.02.14 検索入力フォームの設置
    //20行目のRequest $requestはsearch.blade.phpの
    // ['url' => '/search']からweb.phpを通してデータをまるまる受け取ってる
    public function search(Request $request){
        $users = User::get();
        $searchWord = $request->input('searchWord');
        // dd($request);
        // ddとはデバック関数である 変数に何が入ってるか確認できる
        // ! は「False(ではない)」という意味
        if(!$request->searchWord){
        // select * from users where username like "%レコード名%";
        return redirect('users.search',['searchWord'=>$searchWord,'users'=>$users]);
        }
        // 検索フォームに入力がない場合はユーザー一覧を表示
        else{

        return redirect('users.search',['searchWord'=>$searchWord,'users'=>$users]);
        }
        // それ以外 検索フォームに入力があった場合は入力ワードを出力
    }
}
