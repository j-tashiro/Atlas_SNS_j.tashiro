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
        <p>検索ワード:</p>

        <?php
        $searchName = " {{$users}} ";
        $noSearch ="なし";
        if ($searchName == " フォームの内容 ") {
            echo $searchName ;
        }
        else if ($searchName != " 条件分岐 ") {
            echo $noSearch;
        }
        ?>

    @foreach($users as $user)
        <!-- select * from users where username like "%レコード名%"; -->

        <p class="btn"><a href="">フォローするorフォローを解除</a></p>
    @endforeach
    </div>



@endsection