<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class UsersController extends Controller
{
    public function profile(){
        return view('users.profile');
    }
    public function search(){
        return view('users.search');
    }
    // 2023.02.01 検索入力フォームの設置
    public function userSearch()
    {
        $user = Post::get();
        return view('users.search',['user'=>$user]);
    }
}
