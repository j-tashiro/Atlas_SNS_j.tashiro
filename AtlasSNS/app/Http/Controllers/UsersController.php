<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// 2023.02.22 追加
use Illuminate\Support\Facades\Auth;

// 12行目のUserとUser.phpの10行目のclass Userを同じ名前にすることcontrollerとmodelが連結される modelはテーブルと連結してる
// 26行目と31行目のUser::が情報を受け取れるようになる
use App\User;


class UsersController extends Controller
{
    // 2023.03.21 プロフィール編集
    public function profile(){
        $user = Auth::user();
        return view('users.profile',['user' => $user]);
    }

    // 2023.03.22 プロフィール編集
    public function update(Request $request)
    {
        $id = $request->input('id');
        $username = $request->input('username');
        $mail = $request->input('mail');
        $password = $request->input('password');
        $bio = $request->input('bio');
        Post::where('id','=', $id)->update(['username' => $username,'mail' => $mail,'password' => $password,'bio' => $bio,]);
        return redirect('top');
    }



    // 2023.02.14 検索入力フォームの設置
    public function search(Request $request){
        $searchWord = $request->input('searchWord');
        // dd($searchWord);
        // Laravel あいまい検索 で調べると分かりやすい
        if(!empty($searchWord)){
            // $users = User::where ('username', 'LIKE', '%'.$searchWord.'%')->get();
            $users = User::where ('username', 'LIKE', '%'.$searchWord.'%',)->get();
        }
        else{
            // 31行目と32行目は同じ意味 30行目を理解した上で31行目の省略型を使おう
            // $users = User::where('id' , '!=' , Auth::user()->id)->get();
            $users = User::where('id' , '!=' , Auth::id(),)->get();
        }
        return view('users.search',['searchWord'=>$searchWord,'users'=>$users]);
    }



    // フォロー 2023.03.10 フォローボタン
    public function follow($id)
    {
        $follower = auth()->user();
        // フォローしているか
        $is_following = $follower->isFollowing($id);
        if(!$is_following) {
            // フォローしていなければフォローする
            $follower->follow($id);
            return back();
        }
    }

    // フォロー解除
    public function unfollow($id)
    {
        $follower = auth()->user();
        // フォローしているか
        $is_following = $follower->isFollowing($id);
        if($is_following) {
            // フォローしていればフォローを解除する
            $follower->unfollow($id);
            return back();
        }
    }



}


