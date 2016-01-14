@extends('template')

@section('title')
  YSES Tracker
@stop

@section('includes')
    <link rel="stylesheet" type="text/css"
          href="{{ asset('/css/main.css') }}">
  	<link rel="stylesheet" type="text/css"
      	  href="{{ asset('/css/login.css') }}">
@stop

@section('content')

<div class="container">
    <div class="container" id="login-panel">
            
        <img src="{{ asset('images/logo.png') }}" id="logo" alt="logo">
        
        @if($errors->any())
            <span class="alert alert-danger">
                @foreach($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </span>
        @endif
        <h2 id="welcome">Welcome to YSES Tracker</h2>
        {!! Form::open(['url' => 'account/login']) !!}

            <div class="form-group">
            {!! Form::label('email', 'Email:') !!}<br>
            {!! Form::email('email', null) !!}

            {!! Form::label('password', 'Password:') !!}<br>
            {!! Form::password('password', null) !!}
            </div>
            <br>

            {!! Form::submit('Login', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
        <br>

        <a href="/account/register">
            <button type="button" class="btn btn-primary">Sign Up</button>
        </a>

    </div>

</div>
@stop