@extends('layouts.login')
<!--2022年10月26日 layoutsファイルの中のlogin.blade.phpを読み込んでいる -->

@section('content')

<!-- 2023.02.14 検索入力フォームの設置 -->
    {!! Form::open(['url' => '/userSearch']) !!}
        <div class="search_group"><!--required 意味 必要-->
            {!! Form::input('text', 'searchWord', null, ['required', 'class' => 'form_search', 'placeholder' => 'ユーザー名']) !!}
            <!-- <input type="text" name="searchWord" value="" class="form_search" placeholder="ユーザー名"> -->
            {!! Form::image('images/post.png', 'img', ['class' => 'search_img']) !!}
            <!-- <input type="image" src="images/post.png" class="search_img" name="img" > -->
        </div>
    {!! Form::close() !!}

    <div class="">
        <p>検索ワード:</p>
    </div>

    <div class="all_user">
    @foreach($users as $user)
    <!-- ! は「False(ではない)」という意味 -->
    
        {{ $user->username }}
        <p class="btn"><a href="">フォローするorフォローを解除</a></p>
    @endforeach
    </div>
<!-- usersテーブルのusernameが検索に引っかかったときのワードのみ表示 -->


@endsection