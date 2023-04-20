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
    public function userProfile(){
        $user = Auth::user();
        return view('users.userProfile',['user' => $user]);
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
            'bio' => 'nullable|max:150|string',
            'image' => 'nullable|file|mimes:jpeg,png,bmp,gif,svg',
        ]);
    }


// 2023.03.27
public function profileUpdate(Request $request){
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
        // $image = $request->input('image');
        // 画像だけ読み込み方や更新の仕方が違う→画像は画像データと画像につける名前が必要
        // https://qiita.com/rope19181/items/931968e9e40d2dcad690
        // $image = $request->file("image")->getClientOriginalName();でファイル名のみを取得している
        $image = $request->file("image")->getClientOriginalName();
        $request->file("image")->storeAs("public", $image);

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
    public function userSearch(Request $request){
        $search_word = $request->input('searchWord');
        // Laravel あいまい検索 で調べると分かりやすい
        if(!empty($search_word)){
            // User::where ('username', 'LIKE', '%'.$search_word.'%',)で検索し、
            // ->where('id' , '!=' , Auth::id(),)でログインユーザーを検索から外している
            $users = User::where ('username', 'LIKE', '%'.$search_word.'%',)->where('id' , '!=' , Auth::id(),)->get();
        }
        else{
            // 60行目と61行目は同じ意味 60行目を理解した上で61行目の省略型を使おう
            // $users = User::where('id' , '!=' , Auth::user()->id)->get();
            $users = User::where('id' , '!=' , Auth::id(),)->get();
        }
        return view('users.userSearch',['searchWord'=>$search_word,'users'=>$users]);
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


