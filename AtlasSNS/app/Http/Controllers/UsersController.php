<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// 9行目のUserとUser.phpの10行目のclass Userを
// 同じ名前にすることでテーブルがリンクされ19行目のUser::が情報を受け取れるようになる
use App\User;


class UsersController extends Controller
{
    public function profile(){
        return view('users.profile');
    }
    // 2023.02.07 検索入力フォームの設置
    public function searchRead(){
        $user = User::get();
        // ddとはデバック関数である 変数に何が入ってるか確認できる
        // dd($user);
        return view('users.search',['users'=>$user]);
    }
    //26行目のRequest $requestはsearch.blade.phpの
    // /userSearchからweb.phpを通してデータをまるまる受け取ってる
    public function userSearch(Request $request)
    {
        $searchName = $request->input('searchName');
        // ddとはデバック関数である 変数に何が入ってるか確認できる
        // dd($searchName);
        return view('users.search',['user'=>$searchName]);

    }
}
