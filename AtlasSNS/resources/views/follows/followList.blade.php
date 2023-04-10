@extends('layouts.login')

@section('content')

<!-- http://taustation.com/laravel-uploaded-image-display/ -->
<div class="main_content follow_content">
    <h2>Follow List</h2>
        <!-- foreachの後は($複数形 as $単数形) が一番綺麗  -->
        <!-- アットマークはコメントアウトしても無駄 超重要 -->
        @foreach ($users as $user)
            <div class="follow_image">
                <a href="/user/{{$user->id}}"><img src="{{ \Storage::url($user->image) }}"></a>
            </div>
        @endforeach
</div>

@foreach ($posts as $post)
    <div class="follow_list">
        <!-- https://www.wakuwakubank.com/posts/377-laravel-relation-1/ -->
        <!-- $post->user->imageと$post->user->usernameのuserはpost.phpのuserメソッドを指してる -->
        <div class="">
        <img src="{{ \Storage::url($post->user->image) }}">
        <div class="">
        {{ $post->user->username }}
        {{ $post->post }}
        </div>
        
        </div>
        
        
        {{ $post->created_at }}
    </div>
@endforeach

@endsection