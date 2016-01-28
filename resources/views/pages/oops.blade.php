@extends('template')

@section('title')
    Member
@stop

@section('includes')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('/css/main.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('/css/oops.css') }}">
@stop

@section('navigation')
    @include('../includes/navigation')
@endsection	

@section('content')
	<div class="container" id="remark-panel">
		<div class="col-md-12">
			<div class="col-md-4">
				<img src="{{ asset('images/pusheen.gif') }}" id="pusheen">
			</div>

			<div class="col-md-8">
				<h1>Setting up your account.</h1>
				<hr>
				<p>The Admin will confirm your registration soon.</p>
				<p>PleaSe wait.</p>
				<br>
				<p>You may now logout,</p>
				<p>Pusheen heart heart. Pusheen is love.</p>
			</div>
		</div>
	</div>
@stop
