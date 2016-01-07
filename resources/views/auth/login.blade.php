@extends('template')

@section('title')
  YSES Tracker :: Login
@stop

@section('includes')
    <link rel="stylesheet" type="text/css"
          href="{{ asset('/css/main.css') }}">
  	<link rel="stylesheet" type="text/css"
      	  href="{{ asset('/css/login.css') }}">
@stop

@section('content')
<div class="login">

	<img src="{{ asset('images/logo.png') }}" class="logo" alt="logo">
        @if($errors->any())
            <ul class="alert alert-danger">
            	@foreach($errors->all() as $error)
              	<li>{{ $error }}</li>
              	@endforeach
            </ul>
        @endif

    {!! Form::open(['url' => 'account/login']) !!}

        <div class="form-group">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::email('email', null, ['class' => 'form-control']) !!}

        <br>
        {!! Form::label('password', 'Password:') !!}
        {!! Form::password('password', null, ['class' => 'form-control']) !!}
        </div>

        <br>
        {!! Form::submit('Login', ['class' => 'btn btn-primary form-control']) !!}


  	{!! Form::close() !!}
  	<br>
    <a href="register">
      <a href="/account/register">
    	<button type="button" class="btn btn-primary form-control">Sign Up</button>
      </a>
    </a>

</div>
@stop