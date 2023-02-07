@extends('layouts.login')

@section('content')

<!-- 2023.02.07 検索入力フォームの設置 -->
    {!! Form::open(['url' => '/userSearch']) !!}
        <div class="form-group">
            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => 'ユーザー名']) !!}
            <input type="image" class="form-img"  src="images/post.png">
            <input type="hidden">

            <input type="hidden" id="postId" name="postId" value="" />

        </div>
    {!! Form::close() !!}

    <div class="">
    @foreach($user as $users)
        <p>検索ワード:
            <?php
            if (!empty($_POST['search'])) {
                echo $_POST['search'];
            }
            ?>{{ $users->username }}
        </p>
        <!-- select * from users where username like "%レコード名%"; -->
    @endforeach
        <p class="btn"><a href="">フォローするorフォローを解除</a></p>
    </div>



@endsection