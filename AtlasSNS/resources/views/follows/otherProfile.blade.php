@extends('layouts.login')

@section('content')

<!-- 2023.04.06 他ユーザープロフィール -->
<!-- 他プロフィール otherProfile -->
<div class="main_content">
    <div class="other_profile">
        <img src="{{ \Storage::url($user->image) }}">

            <div class="username_bio">

                <div class="other_title">
                    <p>name</p>
                    <p class="other_bio">bio</p>
                </div>

                <div class="other_content">
                    <p>{{ $user->username }}</p>
                    <p class="other_bio">{{ $user->bio }}</p>
                </div>

            </div>

            <div class="follow_btn">
                    @if (auth()->user()->isFollowing($user->id))
                        <p class="btn red"><a href="/users/{{ $user->id }}/unfollow">フォローを解除</a></p>
                    @else
                        <p class="btn light_blue"><a href="/users/{{ $user->id }}/follow">フォローする</a></p>
                    @endif
                    </div>
    </div>
</div>

@foreach($posts as $post)
<div class="follow_border">
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
</div>
@endforeach

@endsection