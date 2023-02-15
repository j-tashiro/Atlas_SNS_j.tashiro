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
    // 2023.02.14 検索入力フォームの設置
    //20行目のRequest $requestはsearch.blade.phpの
    // ['url' => '/search']からweb.phpを通してデータをまるまる受け取ってる
    public function search(Request $request){
        $users = User::get();
        $searchName = $request->input('searchName');
        // dd($request);
        // ddとはデバック関数である 変数に何が入ってるか確認できる
        if(!$request->search){
        // select * from users where username like "%レコード名%";
        return view('users.search',['searchName'=>$searchName,'users'=>$users]);
        }
        else{
            
        }
    }
}
