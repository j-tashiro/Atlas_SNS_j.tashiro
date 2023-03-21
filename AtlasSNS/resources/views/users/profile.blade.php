@extends('layouts.login')

@section('content')

<!--  2023.03.21 プロフィール編集 -->
{!! Form::open(['url' => '/profile']) !!}

<div class="form_profile">

        <div class="profile_layout">
                {{ Form::label('','user name') }}
                {{ Form::text('username','ログインしてるユーザー名を表示',['class' => 'input',]) }}
        </div>

        <div class="profile_layout">
                {{ Form::label('','mail address') }}
                {{ Form::text('mail','ログインしてるユーザーのメールアドレスを表示',['class' => 'input']) }}
        </div>

        <div class="profile_layout">
                {{ Form::label('','password') }}
                {{ Form::password('password',['class' => 'input']) }}
        </div>

        <div class="profile_layout">
                {{ Form::label('','password confirm') }}
                {{ Form::password('password-confirm',['class' => 'input']) }}
        </div>

        <div class="profile_layout">
                {{ Form::label('','bio') }}
                {{ Form::text('bio','自己紹介文',['class' => 'input']) }}
        </div>

        <div class="profile_layout">
                {{ Form::label('','icon image') }}
                {{ Form::file('icon image', ['class' => 'profile_image']) }}
                <!-- {{ Form::image('icon image',null,['class' => 'input']) }} -->
        </div>

        {{ Form::submit('更新',['class' => 'profile_button']) }}

</div>

{!! Form::close() !!}


@endsection