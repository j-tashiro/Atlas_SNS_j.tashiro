@extends('layouts.login')

@section('content')

<h2>Follow List</h2>

<!-- 2023.03.31. ユーザーのアイコン一覧の設置-->
<!-- http://taustation.com/laravel-uploaded-image-display/ -->
@foreach ($user as $lists)
<img src="{{ \Storage::url($lists->images) }}">
@endforeach

<div class="">
    <img src="{{ asset('/storage/icon1.png') }}">
</div>



@endsection