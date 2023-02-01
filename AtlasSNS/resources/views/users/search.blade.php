@extends('layouts.login')

@section('content')

<!-- 2023.02.01 検索入力フォームの設置 -->
    <div class="form-group">
        {!! Form::open(['url' => 'userSearch']) !!}
            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => 'ユーザー名']) !!}
            <input type="image" src="images/post.png">
        {!! Form::close() !!}
    </div>

    <div class="">
    <p>検索ワード:</p>
    </div>
@endsection