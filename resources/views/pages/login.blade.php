<!-- Structure ONLY -->
<!doctype html>

<head>
  <title>
  YSES Tracker :: Login
  </title>

  <link rel="stylesheet" type="text/css"
      href="{{ asset('/css/bootstrap.css') }}">
  <link rel="stylesheet" type="text/css"
      href="{{ asset('/css/login.css') }}">
</head>


<body>
<div class="login">

  <img src="images/logo.png" class="logo" alt="logo">

  {!! Form::open() !!}

      {!! Form::label('email', 'Email:') !!}
      {!! Form::email('email', null) !!}

    <br>
    <br>

    {!! Form::label('email', 'Password:') !!}
    {!! Form::password('password', null) !!}

    <br>
    <br>

    {!! Form::submit('Log In', ['class' => 'btn btn-primary form-control']) !!}

  {!! Form::close() !!}

  <br>

  <button type="button" class="btn btn-primary form-control">Sign Up</button>

</div>
</body>
</html>
