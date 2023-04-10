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