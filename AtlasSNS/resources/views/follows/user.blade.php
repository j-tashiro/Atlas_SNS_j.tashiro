@extends('layouts.login')

@section('content')

<!-- 2023.04.06 他ユーザープロフィール -->
<img src="{{ \Storage::url($user->image) }}">
{{ $user->username }}
{{ $user->bio }}
{{ $user->created_at }}

@if (auth()->user()->isFollowing($user->id))
    <p class="btn red"><a href="/users/{{ $user->id }}/unfollow">フォローを解除</a></p>
    @else
    <p class="btn light_blue"><a href="/users/{{ $user->id }}/follow">フォローする</a></p>
@endif

@foreach($posts as $post)
<img src="{{ \Storage::url($post->user->image) }}">
{{ $post->user->username }}
{{ $post->post }}
{{ $post->created_at }}
@endforeach



@endsection