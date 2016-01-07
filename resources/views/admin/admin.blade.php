@extends('template')

@section('title')
Admin Panel
@stop

@section('includes')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('/css/main.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('/css/admin/admin.css') }}">
@stop

@section('navigation')
    @include('../includes/navigation')
@stop

@section('content')
	<div class="container">
		<div class="col-md-12" id="admin-container">
			<div class="section">
				<h2>User Requests</h2>
				<hr>
				@foreach($pendings as $pending)
				<div class="col-md-12 request-panel">
					<div class="col-md-4">
						<div class="user">
							<h4>{{ $pending->fname }} {{ $pending->mname }} {{ $pending->lname }}</h4><br>
							Student Number: {{ $pending->studno }}<br>
							Email: {{ $pending->email }}<br>
							Username: {{ $pending->username }} <br>
							Department: {{ $pending->department }}<br>
							Batch: {{ $pending->batch }}<br>
						</div>
					</div>
					<div class="col-md-4">
						{!! Form::open(['url' => 'admin/evaluate']) !!}
						<div class="committee">
						Is the User the OAH?<br>
						<input type="radio" name="isoah" value="YES" required> YES
						<input type="radio" name="isoah" value="NO" required> NO <br/>
						<br>
						Select User Committee:<br>
							<select name="comm_id">
							@foreach($committee as $cmte)
							<option value="{{ $cmte->id }}">{{ $cmte->name }}</option>
							@endforeach
							</select>
						<br><br>
						Is the User a Head?<br>
						<input type="radio" name="ishead" value="YES" required> YES
						<input type="radio" name="ishead" value="NO" required> NO <br/>
						</div>

					</div>
					<div class="col-md-4">
						Recommendation:<br>
						<input type="radio" name="isaprv" value="YES" required>Accept
						<input type="radio" name="isaprv" value="NO" required>Delete<br>
						<br>
						<input type="hidden" name="user_id" value="{{ $pending->id }}"> 
						{!! Form::submit('Submit', ['class' => 'btn']) !!}
					{!! Form::close() !!}
					</div>
				</div>
				@endforeach

			</div>
			<div class="section">
				<h2>Summary</h2>
				<hr>
        @include('admin\data')
			</div>
		</div>
	</div>
@stop
