@extends('layouts.login')

@section('content')

<!-- 2023.02.14 検索入力フォームの設置 -->
    {!! Form::open(['url' => '/search']) !!}
        <div class="form-group"><!--required 意味 必要-->
            {!! Form::input('text', 'searchWord', null, ['required', 'class' => 'form-control', 'placeholder' => 'ユーザー名']) !!}
            <!-- <input type="text" name="searchWord" value="" class="form-control" placeholder="ユーザー名"> -->
            {!! Form::image('images/post.png', 'img', ['class' => 'form-img']) !!}
            <!-- <input type="image" src="images/post.png" class="form-img" name="img" > -->
        </div>
    {!! Form::close() !!}

    <div class="">
        <p>検索ワード:{{ $searchWord }}</p>






    @foreach($users as $user)
        {{ $user->username }}
        <p class="btn"><a href="">フォローするorフォローを解除</a></p>
    @endforeach
    </div>



@endsection