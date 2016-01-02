@extends('template')

@section('title')
DB Data
@stop

@section('includes')
  <link rel="stylesheet" type="text/css"
    href="{{ asset('/css/main.css') }}">

  <style type="text/css">
  		table {
  			width: 100%;
  			margin-top: 20px;
  		}
  		h4 {
  			font-weight: bold;
  		}
  </style>

@stop

@section('content')
	<div class="container">
		<h4>Users from the DB:</h4>
		<table class="table">
		<tr>
			<th>ID</th>
			<th>First Name</th>
			<th>Middle Name</th>
			<th>Last Name</th>
			<th>Username</th>
			<th>Email</th>
			<th>Password</th>
			<th>Student Number</th>
			<th>Department</th>
			<th>YSES Batch</th>
		</tr>
		@foreach($users as $user)
		<tr>
			<td>{{ $user->id }}</td>
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

	<div class="container">
		<h4>Events from the DB:</h4>
		<table class="table">
		<tr>
			<th>Event ID</th>
			<th>Title</th>
			<th>Theme</th>
			<th>Semester</th>
			<th>Year</th>
			<th>Weight</th>
			<th>OAH / User ID (foreign)</th>
		</tr>
		@foreach($events as $event)
		<tr>
			<td>{{ $event->event_id }}</td>
			<td>{{ $event->title }}</td>
			<td>{{ $event->theme }}</td>
			<td>{{ $event->sem }}</td>
			<td>{{ $event->year }}</td>
			<td>{{ $event->weight }}</td>
			<td>{{ $event->oah_id }}</td>
		</tr>
		@endforeach
		</table>
	</div>

	<div class="container">
		<h4>Committees from the DB:</h4>
		<table class="table">
		<tr>
			<th>Comm ID</th>
			<th>Comm Name</th>
			<th>Weight</th>
			<th>Event ID (foreign)</th>
		</tr>
		@foreach($committees as $committee)
		<tr>
			<td>{{ $committee->comm_id }}</td>
			<td>{{ $committee->name }}</td>
			<td>{{ $committee->weight }}</td>
			<td>{{ $committee->event_id }}</td>
		</tr>
		@endforeach
		</table>
	</div>

	<div class="container">
		<h4>Heads from the DB:</h4>
		<table class="table">
		<tr>
			<th>Head ID</th>
			<th>Position</th>
			<th>Head / User ID (foreign)</th>
			<th>Comm ID (foreign)</th>
			<th>Event ID (foreign)</th>
		</tr>
		@foreach($heads as $head)
		<tr>
			<td>{{ $head->head_id }}</td>
			<td>{{ $head->position }}</td>
			<td>{{ $head->user_id }}</td>
			<td>{{ $head->comm_id }}</td>
			<td>{{ $head->event_id }}</td>
		</tr>
		@endforeach
		</table>
	</div>

@stop
