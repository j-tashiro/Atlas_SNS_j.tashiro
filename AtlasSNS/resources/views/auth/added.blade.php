@extends('layouts.logout')

@section('content')

<div id="clear">
  <p class="form_clear">{{ session('register_date') }}さん</p>
  <p class="form_clear">ようこそ！AtlasSNSへ！</p>
  <p><br></p>
  <p><br></p>
  <p>ユーザー登録が完了いたしました。</p>
  <p>早速ログインをしてみましょう！</p>
  <p><br></p>
  <p><br></p>
  <p class="form_btn"><a href="/login">ログイン画面へ</a></p>
</div>

@endsection