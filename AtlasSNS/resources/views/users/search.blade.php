@extends('layouts.login')

@section('content')

<!-- 2023.02.01 検索入力フォームの設置 -->
    {!! Form::open(['url' => 'userSearch']) !!}
        <div class="form-group">
            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => 'ユーザー名']) !!}
            <input class="form-img" type="image" src="images/post.png">
        </div>
    {!! Form::close() !!}



    <div class="">
        <p>検索ワード:</p>
        <p class="btn"><a href="">フォローするorフォローを解除</a></p>
    </div>


@endsection