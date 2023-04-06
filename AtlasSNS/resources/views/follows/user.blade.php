@extends('layouts.login')

@section('content')

<!-- 2023.04.06 他ユーザープロフィール -->

{{ $user->username }}
{{ $user->bio }}

    <img src="{{ \Storage::url($user->image) }}">


@endsection