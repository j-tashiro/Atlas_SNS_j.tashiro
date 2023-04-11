@extends('layouts.login')

@section('content')

<!-- 2023.04.06 他ユーザープロフィール -->
<div class="main_content user_profile">
    <img src="{{ \Storage::url($user->image) }}">
    {{ $user->username }}
    {{ $user->bio }}
    @if (auth()->user()->isFollowing($user->id))
        <p class="btn red"><a href="/users/{{ $user->id }}/unfollow">フォローを解除</a></p>
        @else
        <p class="btn light_blue"><a href="/users/{{ $user->id }}/follow">フォローする</a></p>
    @endif
</div>

@foreach($posts as $post)
    <div class="follow_lists">
        <div class="follow_list">
            <img src="{{ \Storage::url($post->user->image) }}">
                <div class="username_post">
                    <p>{{ $post->user->username }}</p>
                    <p>{{ $post->post }}</p>
                </div>
        </div>
        <p>{{ $post->created_at }}</p>
    </div>
@endforeach

@endsection