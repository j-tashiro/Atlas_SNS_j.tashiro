@extends('layouts.login')

@section('content')

<h2>Follower List</h2>

<div class="">
@foreach ($users as $user)
    <a href="/user/{{$user->id}}"><img src="{{ \Storage::url($user->image) }}"></a>
@endforeach
</div>



<div class="">
@foreach ($posts as $post)
    <img src="{{ \Storage::url($post->user->image) }}">
    {{ $post->user->username }}

    {{ $post->post }}
    {{ $post->created_at }}
@endforeach
</div>



@endsection