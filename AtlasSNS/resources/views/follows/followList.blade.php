@extends('layouts.login')

@section('content')

<h2>Follow List</h2>

<!-- 2023.04.01. ユーザーのアイコン一覧の設置-->
<!-- http://taustation.com/laravel-uploaded-image-display/ -->
<div class="user_images">

<!-- foreachの後は($複数形 as $単数形) が一番綺麗  -->
<!-- アットマークはコメントアウトしても無駄 超重要 -->
@foreach ($users as $user)
    <a href="/follow-list/{{$user->id}}"><img src="{{ \Storage::url($user->image) }}"></a>
@endforeach
</div>





<!-- foreachの後は($複数形 as $単数形) が一番綺麗  -->
<div class="">
@foreach ($posts as $post)
    <!-- https://www.wakuwakubank.com/posts/377-laravel-relation-1/ -->
    <!-- $post->user->imageと$post->user->usernameのuserはpost.phpのuserメソッドを指してる -->
    <img src="{{ \Storage::url($post->user->image) }}">
    {{ $post->user->username }}

    {{ $post->post }}
    {{ $post->created_at }}
@endforeach
</div>



@endsection