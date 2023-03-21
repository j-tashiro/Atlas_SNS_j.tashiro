@extends('layouts.login')

@section('content')

{!! Form::open(['url' => '/profile']) !!}

<div class="form_profile">

        <div class="profile_layout">
                {{ Form::label('','user name') }}
                {{ Form::text('username',null,['class' => 'input','placeholder' => 'ログインしてるユーザー名を表示']) }}
        </div>

        <div class="profile_layout">
                {{ Form::label('','mail address') }}
                {{ Form::text('mail',null,['class' => 'input']) }}
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
                {{ Form::text('bio',null,['class' => 'input']) }}
        </div>

        <div class="profile_layout">
                {{ Form::label('','icon image') }}
                {{ Form::image('icon image',null,['class' => 'input']) }}
        </div>

        {{ Form::submit('更新',['class' => 'profile_button']) }}

</div>

{!! Form::close() !!}

@endsection