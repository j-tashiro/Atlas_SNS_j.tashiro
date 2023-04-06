@extends('layouts.login')

@section('content')

<!-- 2023.04.06 他ユーザープロフィール -->
<img src="{{ \Storage::url($user->image) }}">
{{ $user->username }}
{{ $user->bio }}
{{ $user->created_at }}



@endsection