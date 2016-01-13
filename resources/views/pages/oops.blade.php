@extends('template')

@section('title')
    Member
@stop

@section('includes')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('/css/main.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('/css/profile.css') }}">
@stop

@section('navigation')
    @include('../includes/navigation')
@endsection	

@section('content')
	<br><br><br><br>
	<div class="container">
		<h1>You should not be here.</h1>
		<h1>The Admin will confirm your registration soon.</h1>
	</div>
	<br><br><br><br>
@stop
