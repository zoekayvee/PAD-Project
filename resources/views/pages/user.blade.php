@extends('template')

@section('title')
User List
@endsection

@section('includes')
  <link rel="stylesheet" type="text/css"
    href="{{ asset('/css/profile.css') }}">
  <style type="text/css">
  		table {
  			width: 100%;
  		}
  </style>
@endsection

@section('content')
	<div class="container">
		<h1>Users from the DB:</h1>

		<table class="table">
		<tr>
			<th>First Name</th>
			<th>Middle Name</th>
			<th>last Name</th>
			<th>Email</th>
			<th>Password</th>
			<th>Birthday</th>
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
			<td>{{ $user->birthday }}</td>
			<td>{{ $user->studno }}</td>
			<td>{{ $user->department }}</td>
		</tr>
		@endforeach
		</table>
	</div>
@endsection