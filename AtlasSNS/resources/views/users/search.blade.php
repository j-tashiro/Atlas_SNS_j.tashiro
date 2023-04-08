@extends('layouts.login')
<!--2022年10月26日 layoutsファイルの中のlogin.blade.phpを読み込んでいる -->

@section('content')

<div class="main_content">
    <div class="search_content">
        {!! Form::open(['url' => '/search']) !!}
            <div class="search_group"><!--required 意味 必要-->
                {!! Form::input('text', 'searchWord', null, ['required', 'class' => 'form_search', 'placeholder' => 'ユーザー名']) !!}
                <!-- <input type="text" name="searchWord" value="" class="form_search" placeholder="ユーザー名"> -->
                {!! Form::image('images/post.png', 'img', ['class' => 'search_img']) !!}
                <!-- <input type="image" src="images/post.png" class="search_img" name="img" > -->
            </div>
        {!! Form::close() !!}
        <div class="search_Word">
            @if(!empty($searchWord))
                <p>検索ワード:{{ $searchWord }}</p>
            @else
                <p></p>
            @endif
        </div>
    </div>
</div>

    @foreach($users as $user)
        <div class="all_user">
            <div class="image_username">
                <img src="{{ \Storage::url($user->image) }}">
                <p>{{ $user->username }}</p>
            </div>
                @if (auth()->user()->isFollowing($user->id))
                <p class="btn red"><a href="/users/{{ $user->id }}/unfollow">フォローを解除</a></p>
                @else
                <p class="btn light_blue"><a href="/users/{{ $user->id }}/follow">フォローする</a></p>
                @endif
        </div>
    @endforeach

<!-- https://qiita.com/namizatork/items/0c81b0a94a1084cda6de 参考サイト Laravel 第6回 -->

@endsection