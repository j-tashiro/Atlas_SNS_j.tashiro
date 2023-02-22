<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// 2023.02.22 追加
use Illuminate\Support\Facades\Auth;

// 12行目のUserとUser.phpの10行目のclass Userを
// 同じ名前にすることでテーブルがリンクされ21行目のUser::が情報を受け取れるようになる
use App\User;


class UsersController extends Controller
{
    public function profile(){
        return view('users.profile');
    }
    // 2023.02.14 検索入力フォームの設置
    public function search(){
        $users = User::get();
        // dd($users);
        return view('users.search',['users'=>$users]);
    }
    //28行目のRequest $requestはsearch.blade.phpの
    // ['url' => '/userSearch']からweb.phpを通してデータをまるまる受け取ってる
    public function userSearch(Request $request){
        $users = User::get();
        $searchWord = $request->input('searchWord');

        if($request->isMethod('post')){
            return view('users.search',['searchWord'=>$searchWord]);
        }else{
            return view('users.search',['users'=>$users]);
        }
    }
}
