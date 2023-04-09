@extends('layouts.login')

@section('content')

<div class="main_content follow_content">
    <h2>Follower List</h2>
        @foreach ($users as $user)
            <div class="follow_image">
                <a href="/user/{{$user->id}}"><img src="{{ \Storage::url($user->image) }}"></a>
            </div>
        @endforeach
</div>

@foreach ($posts as $post)
    <div class="follower_list">
        <img src="{{ \Storage::url($post->user->image) }}">
        {{ $post->user->username }}
        {{ $post->post }}
        {{ $post->created_at }}
    </div>
@endforeach


@endsection