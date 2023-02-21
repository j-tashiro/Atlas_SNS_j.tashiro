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
    public function search(){
        $users = User::get();
        return view('users.search',['users'=>$users]);
    }
    //24行目のRequest $requestはsearch.blade.phpの
    // ['url' => '/userSearch']からweb.phpを通してデータをまるまる受け取ってる
    public function userSearch(Request $request){
        $searchWord = $request->input('searchWord');

        // dd($searchWord);
        return redirect('users.search',['searchWord'=>$searchWord,'users'=>$users]);
    }
}
