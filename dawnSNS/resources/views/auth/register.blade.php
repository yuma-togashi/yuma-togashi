@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<h2>新規ユーザー登録</h2>

{{ Form::label('UserName') }}
{{ Form::text('username',null,['class' => 'input']) }}
@if ($errors->has('username'))
    <p class="validate">
        <strong>{{ $errors->first('username') }}</strong>
    </p>
@endif

{{ Form::label('MailAdress') }}
{{ Form::text('mail',null,['class' => 'input']) }}
@if ($errors->has('mail'))
    <p class="validate">
        <strong>{{ $errors->first('mail') }}</strong>
    </p>
@endif

{{ Form::label('Password') }}
{{ Form::text('password',null,['class' => 'input']) }}

{{ Form::label('Password confirm') }}
{{ Form::text('password_confirmation',null,['class' => 'input']) }}

{{ Form::submit('登録') }}

<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection
