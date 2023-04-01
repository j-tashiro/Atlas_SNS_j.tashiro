@extends('layouts.login')

@section('content')

<h2>Follow List</h2>

<!-- 2023.03.31. ユーザーのアイコン一覧の設置-->
<!-- http://taustation.com/laravel-uploaded-image-display/ -->
<div class="user_images">
@foreach ($user as $lists)
    <img src="{{ \Storage::url($lists->image) }}">
@endforeach
</div>
@foreach ($posts as $post)
{{ $post->post }}

@endforeach





@endsection