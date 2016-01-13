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
<div id="overlay"></div>

<div class="container">
    <div class="col-md-12" id="panel-wrapper">

        <div class="col-md-7" id="foreword">
            <h1>YSES TRACKER</h1>
            <hr>
            <h4>WELCOME YSERS!</h4>
            <p><br>Supporting plant tissue culture for genetic conservation is like supporting human survival.
            It is a good and efficient way of preserving plants because it speeds up propagation of many species and varieties of plants.
            <br><br>It is our responsibility to conserve current species for future use and plant tissue culture is an innovation to make this happen.</p>
            <hr>
        </div>

    <div class="col-md-5 card" id="login-panel">

        <div class="" id="logo">
            <center>                
            <img src="{{ asset('images/logo.png') }}" alt="logo">
            </center>
        </div>
        
        @if($errors->any())
            <span class="alert alert-danger">
                @foreach($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </span>
        @endif


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
</div>
@stop