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
        $user = Auth::user();
        // $user->username = $request->username;
        $user->username = $request->input('username');

        // $user->mail = $request->mail;
        $user->mail = $request->input('mail');

        // $user->password = bcrypt($request->password);
        // $user->password = bcrypt($request->input('password'));

        // $user->bio = $request->bio;
        $user->bio = $request->input('bio');

        // $user->image = $request->image;
        // $user->image = $request->input('image');
        // dd($user);

        $user->save();
        return redirect('top');
    }
    // https://poppotennis.com/posts/laravel-update-users
    // https://qiita.com/meow_o_o/items/e99450518777fd854e34

    // 途中
    protected function validator(array $data){
        return Validator::make($data, [
            'username' => 'required|min:2|max:12|string',
            'mail' => 'required|min:5|max:40|unique:users|email|string',
            'password' => 'required|min:8|max:20|string',
            'bio' => 'max:150|string',
            'image' => '',
        ]);
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
            // 60行目と61行目は同じ意味 60行目を理解した上で61行目の省略型を使おう
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


