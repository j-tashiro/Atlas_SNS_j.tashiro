@extends('layouts.logout')

@section('content')
<!-- 2022.10.19 エラー文を表示させる -->
{!! Form::open(['url' => '/register']) !!}

@foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
@endforeach
<div class="form_login">

<h2>新規ユーザー登録</h2>

        {{ Form::label('','user name') }}
        {{ Form::text('username',null,['class' => 'input']) }}

        {{ Form::label('','mail address') }}
        {{ Form::text('mail',null,['class' => 'input']) }}

        {{ Form::label('','password') }}
        {{ Form::password('password',['class' => 'input']) }}

        {{ Form::label('','password confirm') }}
        {{ Form::password('password-confirm',['class' => 'input']) }}

        {{ Form::submit('REGISTER',['class' => 'login_button']) }}

<p><a href="/login">ログイン画面へ戻る</a></p>

</div>

{!! Form::close() !!}


@endsection
