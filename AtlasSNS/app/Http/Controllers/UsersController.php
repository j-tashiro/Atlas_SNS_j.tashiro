<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// 2023.04.01 Auth::userを起動させるために必要な記述
use Illuminate\Support\Facades\Auth;

// use App\User;のUserとUser.phpの10行目のclass Userを同じ名前にすることcontrollerとmodelが連結される modelはテーブルと連結してる
// User::が情報を受け取れるようになる
use App\User;
use Illuminate\Support\Facades\Validator;


class UsersController extends Controller
{
    // 2023.03.21 プロフィール編集
    public function profile(){
        $user = Auth::user();
        return view('users.profile',['user' => $user]);
    }

    // 2023.03.27 プロフィール編集 バリデーション
    protected function validator(array $data){
        return Validator::make($data, [
            'username' => 'required|min:2|max:12|string',
            // 'mail' => 'required|min:5|max:40|unique:users|email|string',
            'mail' => 'required|min:5|max:40|unique:users,mail,'.$data['mail'].',mail|email|string',
            // https://qiita.com/kaitaku/items/d38e9e498b094405dede
            // |unique:users,mail,'.$data['mail'].',mail|
            // 第1引数=users チェックをしたいテーブル名
            // 第2引数=mail チェックをしたいカラム名
            // 第3引数=.$data['mail']. .チェックの対象外にしたいデータがあるレコードの主キー.
            // 第4引数=mail チェックの対象外にしたいデータがあるレコードの主キーのカラム名
            'password' => 'required|confirmed|min:8|max:20|string',
            'bio' => 'max:150|string',
            'image' => '',
        ]);
    }


// 2023.03.27
public function update(Request $request){
    if($request->isMethod('post')){
    $data = $request->input();

    $validator = $this->validator($data);

    // バリデーションに引っかかった場合
    if($validator->fails()){
        return redirect()->back()
        ->withInput()
        ->withErrors($validator);
    }
    // バリデーションに問題がない場合
    else{
        $id = $request->input('id');
        $username = $request->input('username');
        $mail = $request->input('mail');
        $password = $request->input('password');
        $bio = $request->input('bio');
        $image = $request->input('image');
        user::where('id','=', $id)->update([
            'username' => $username,
            'mail' => $mail,
            'password' => bcrypt($password),
            'bio' => $bio,
            'image' => $image,
        ]);
        return redirect('top');
        }
    }
    return view('auth.register');
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


