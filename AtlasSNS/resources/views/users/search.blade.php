@extends('layouts.login')

@section('content')

<!-- 2023.02.07 検索入力フォームの設置 -->
    {!! Form::open(['url' => '/userSearch']) !!}
        <div class="form-group"><!--required 意味 必要-->
            {!! Form::input('text', 'searchName', null, ['required', 'class' => 'form-control', 'placeholder' => 'ユーザー名']) !!}
            <!-- <input type="text" name="searchName" value="" class="form-control" placeholder="ユーザー名"> -->
            {!! Form::image('images/post.png', 'img', ['class' => 'form-img']) !!}
            <!-- <input type="image" src="images/post.png" class="form-img" name="img" > -->
        </div>
    {!! Form::close() !!}

    <div class="">
    @foreach($user as $users)
        <p>検索ワード:</p>
        <p>$searcName</p>
        <!-- select * from users where username like "%レコード名%"; -->
    @endforeach
        <p class="btn"><a href="">フォローするorフォローを解除</a></p>
    </div>



@endsection