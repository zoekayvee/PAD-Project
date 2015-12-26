@extends('template')

@section('title')
User List
@stop

@section('includes')
  <link rel="stylesheet" type="text/css"
    href="{{ asset('/css/profile.css') }}">
  <style type="text/css">
  		table {
  			width: 100%;
  		}
  </style>
@stop

@section('content')
	<div class="container">
		<h1>Users from the DB:</h1>
		<button class="btn btn-default"><a href="register">Register Here</a></button>

		<table class="table">
		<tr>
			<th>First Name</th>
			<th>Middle Name</th>
			<th>last Name</th>
			<th>Email</th>
			<th>Password</th>
			<th>Student Number</th>
			<th>Department</th>
		</tr>
		@foreach($users as $user)
		<tr>
			<td>{{ $user->firstname }}</td>
			<td>{{ $user->middlename }}</td>
			<td>{{ $user->lastname }}</td>
			<td>{{ $user->email }}</td>
			<td>{{ $user->password }}</td>
			<td>{{ $user->studno }}</td>
			<td>{{ $user->department }}</td>
		</tr>
		@endforeach
		</table>
	</div>
@stop
