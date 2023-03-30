@extends('layouts.login')

@section('content')
<h2>Follow List</h2>
@if($post->image == null)
    <img src="/storage/icon1.png">
@else
    <img src="/storage/{{$user->image}}">
@endif
@endsection