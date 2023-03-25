<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
// use App\Http\Requests\RegisterFormRequest;/*2023.03.24 追加 */
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data){
        return Validator::make($data, [
            'username' => 'required|min:2|max:12|string',
            'mail' => 'required|min:5|max:40|unique:users|email|string',
            'password' => 'required|min:8|max:20|string',
            'password-confirm' => 'required|min:8|max:20|confirmed:password|string',
        ]);
    }

//英数字のバリテーションができてない
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data){
        return User::create([
            'username' => $data['username'],
            // dd($data['username']);
            'mail' => $data['mail'],
            // dd($data['mail']);
            'password' => bcrypt($data['password']),

        ]);
    }

    // 2023.03.25 新規登録
    public function register(Request $request){
        // web.phpのpost 投稿のpostという意味ではない
        if($request->isMethod('post')){
        //2023.03.25 入力したデータを$dataにしている
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
            //2023.03.25 createメソッドに飛ぶ
            $this->create($data);
            // 1=2-1
            $user = $request->get('username');
            return redirect('added')->with('register_date', $user);
            }
        }
        return view('auth.register');
    }

    public function added()
    {
        return view('auth.added');
    }
}
