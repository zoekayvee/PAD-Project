@extends('template')

@section('title')
User List
@stop

@section('includes')
  <link rel="stylesheet" type="text/css"
    href="{{ asset('/css/main.css') }}">

  <style type="text/css">
  		table {
  			width: 100%;
  			margin-top: 20px;
  		}
  </style>

@stop

@section('content')
	<div class="container">
		<h1>Users from the DB:</h1>
		<a href="register"><button class="btn btn-warning">Register Here</button></a>

		<table class="table">
		<tr>
			<th>First Name</th>
			<th>Middle Name</th>
			<th>Last Name</th>
			<th>Username</th>
			<th>Email</th>
			<th>Password (encrypted)</th>
			<th>Student Number</th>
			<th>Department</th>
			<th>YSES Batch</th>
		</tr>
		@foreach($users as $user)
		<tr>
			<td>{{ $user->fname }}</td>
			<td>{{ $user->mname }}</td>
			<td>{{ $user->lname }}</td>
			<td>{{ $user->username }}</td>
			<td>{{ $user->email }}</td>
			<td>{{ $user->password }}</td>
			<td>{{ $user->studno }}</td>
			<td>{{ $user->department }}</td>
			<td>{{ $user->batch }}</td>
		</tr>
		@endforeach
		</table>
	</div>
@stop
