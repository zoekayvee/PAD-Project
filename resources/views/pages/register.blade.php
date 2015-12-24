@extends('template')

@section('title')
Register
@endsection

@section('includes')
<!-- replaces @yield('includes') on the template html, see \resources\views\template.blade.php -->
  <link rel="stylesheet" type="text/css"
    href="{{ asset('/css/profile.css') }}">
@endsection

@section('content')
	<br><br>

	<div class="container">
	
	{!! Form::open(['url' => 'users']) !!}
		<div class="form-group">	
		{!! Form::label('firstname', 'First Name:') !!}
		{!! Form::text('firstname', null, ['class' => 'form-control']) !!}
	
		{!! Form::label('middlename', 'Middle Name:') !!}
		{!! Form::text('middlename', null, ['class' => 'form-control']) !!}

		{!! Form::label('lastname', 'Last Name:') !!}
		{!! Form::text('lastname', null, ['class' => 'form-control']) !!}

		{!! Form::label('email', 'Email:') !!}
		{!! Form::email('email', null, ['class' => 'form-control']) !!}

		<br>

		{!! Form::label('password', 'Password:') !!}
		{!! Form::password('password', null, ['class' => 'form-control']) !!}

		<br><br>

		{!! Form::label('studno', 'Student Number:') !!}
		{!! Form::text('studno', null, ['class' => 'form-control']) !!}

		{!! Form::label('department', 'Department:') !!}
		{!! Form::text('department', null, ['class' => 'form-control']) !!}

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

@endsection