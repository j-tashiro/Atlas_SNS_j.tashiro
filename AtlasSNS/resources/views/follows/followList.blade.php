@extends('layouts.login')

@section('content')

<h2>Follow List</h2>

<!-- 2023.04.01. ユーザーのアイコン一覧の設置-->
<!-- http://taustation.com/laravel-uploaded-image-display/ -->
<div class="user_images">

<!-- foreachの後は($複数形 as $単数形) が一番綺麗  -->
<!-- アットマークはコメントアウトしても無駄 超重要 -->
@foreach ($users as $user)
    <img src="{{ \Storage::url($user->image) }}">
@endforeach
</div>





<!-- foreachの後は($複数形 as $単数形) が一番綺麗  -->
@foreach ($posts as $post)

    <!-- $post->user->imageと$post->user->usernameのuserはpost.phpのuserメソッドを指してる -->
    <img src="{{ \Storage::url($post->user->image) }}">
    {{ $post->user->username }}

    <!-- postsテーブルから引っ張ってきて出力してる -->
    {{ $post->post }}
    {{ $post->created_at }}


@endforeach



@endsection