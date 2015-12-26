@extends('template')

@section('title')
Register
@stop

@section('includes')
<!-- replaces @yield('includes') on the template html, see \resources\views\template.blade.php -->
    <link rel="stylesheet" type="text/css"
          href="{{ asset('/css/main.css') }}">

@stop

@section('content')
	<br><br>

	<div class="container">
	
	{!! Form::open(['url' => 'account/register']) !!}
		<div class="form-group">
		{!! Form::label('fname', 'First Name:') !!}
		{!! Form::text('fname', "Jason", ['class' => 'form-control']) !!}
	
		{!! Form::label('mname', 'Middle Name:') !!}
		{!! Form::text('mname', "Hey", ['class' => 'form-control']) !!}

		{!! Form::label('lname', 'Last Name:') !!}
		{!! Form::text('lname', "Derulo", ['class' => 'form-control']) !!}

		{!! Form::label('username', 'Username:') !!}
		{!! Form::text('username', null, ['class' => 'form-control']) !!}

		{!! Form::label('email', 'Email:') !!}
		{!! Form::email('email', null, ['class' => 'form-control']) !!}

		<br>

		{!! Form::label('password', 'Password:') !!}
		{!! Form::password('password', null, ['class' => 'form-control']) !!}

		<br><br>

		{!! Form::label('studno', 'Student Number:') !!}
		{!! Form::text('studno', null, ['class' => 'form-control']) !!}

		{!! Form::label('department', 'Department:') !!}
		{!! Form::text('department', "PAD", ['class' => 'form-control']) !!}

		{!! Form::label('batch', 'YSES Batch:') !!}
		{!! Form::text('batch', "blendeD", ['class' => 'form-control']) !!}

		<br>
		{!! Form::submit('Register', ['class' => 'btn btn-primary form-control']) !!}

		</div>
	{!! Form::close() !!}

	<br><br>

	@if($errors->any())
		<ul class="alert alert-danger">
			@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	@endif
	</div>

@stop