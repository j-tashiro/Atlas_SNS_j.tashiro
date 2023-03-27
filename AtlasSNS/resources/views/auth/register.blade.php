@extends('layouts.logout')

@section('content')

{!! Form::open(['url' => '/register']) !!}

<div class="form_login">

@foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
@endforeach

<h2>新規ユーザー登録</h2>

        {{ Form::label('','user name') }}
        {{ Form::text('username',null,['class' => 'input']) }}

        {{ Form::label('','mail address') }}
        {{ Form::text('mail',null,['class' => 'input']) }}

        {{ Form::label('','password') }}
        {{ Form::password('password',['class' => 'input']) }}

        {{ Form::label('','password confirm') }}
        <!--  2023.03.27 バリデーション 確認 https://readouble.com/laravel/6.x/ja/validation.html#rule-confirmed -->
        <!-- ファサードの名前 name属性を確認 -->
        <!-- バリデーションに必須 -->
        {{ Form::password('password_confirmation',['class' => 'input']) }}

        {{ Form::submit('REGISTER',['class' => 'login_button']) }}

<p><a href="/login">ログイン画面へ戻る</a></p>

</div>

{!! Form::close() !!}


@endsection
