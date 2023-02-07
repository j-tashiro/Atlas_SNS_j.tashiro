<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// 9行目のUserとUser.phpの10行目のclass Userを
// 同じ名前にすることでテーブルがリンクされ情報を受け取れるようになる
use App\User;


class UsersController extends Controller
{
    public function profile(){
        return view('users.profile');
    }
    // 2023.02.07 検索入力フォームの設置
    public function searchRead(){
        $user = User::get();
        return view('users.search',['user'=>$user]);
    }
    // 2023.02.07 検索入力フォームの設置
    // public function userSearch()
    // {
    //     $user = User::get();
    //     return view('users.search',['user'=>$user]);
    // }
}
