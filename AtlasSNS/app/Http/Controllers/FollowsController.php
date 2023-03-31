<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class FollowsController extends Controller
{
    //
    public function followList(){
        return view('follows.followList');
    }
    public function followerList(){
        return view('follows.followerList');
    }

    // 2023.03.31 フォローリスト
    public function follow_list()
    {
        $list = User::get();
        return view('follows.followList',['user'=>$list]);
    }

    // 2023.03.31 フォロワーリスト
    public function follower_list()
    {
        $list = User::get();
        return view('follows.followerList',['post'=>$list]);
    }
}
