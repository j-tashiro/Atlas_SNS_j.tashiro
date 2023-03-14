@extends('layouts.logout')

@section('content')
<!-- 2022.10.19 エラー文を表示させる -->
{!! Form::open(['url' => '/register']) !!}

<div class="form_login">

<h2>新規ユーザー登録</h2>

        {{ Form::label('','user name') }}
        {{ Form::text('username',null,['class' => 'input']) }}

        {{ Form::label('','mail address') }}
        {{ Form::text('mail',null,['class' => 'input']) }}

        {{ Form::label('','password') }}
        {{ Form::text('password',null,['class' => 'input']) }}

        {{ Form::label('','password confirm') }}
        {{ Form::text('password-confirm',null,['class' => 'input']) }}

        {{ Form::submit('REGISTER',['class' => 'login_button']) }}

<p><a href="/login">ログイン画面へ戻る</a></p>

</div>

{!! Form::close() !!}


@endsection
