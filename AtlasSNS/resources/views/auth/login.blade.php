@extends('layouts.logout')

@section('content')


{!! Form::open() !!}

<div class="form_login">

<p>AtlasSNSへようこそ</p>

    <div class="form_mail">
        {{ Form::label('mail adress') }}
        {{ Form::text('mail',null,['class' => 'input']) }}
    </div>

    <div class="form_password">
        {{ Form::label('password') }}
        {{ Form::password('password',['class' => 'input']) }}
    </div>

    <div class="form_submit">
        {{ Form::submit('LOGIN') }}
    </div>

<p><a href="/register">新規ユーザーの方はこちら</a></p>

</div>
{!! Form::close() !!}




@endsection