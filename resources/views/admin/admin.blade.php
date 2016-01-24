@extends('template')

@section('title')
Admin Panel
@stop

@section('includes')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('/css/admin/admin.css') }}">
@stop

@section('navigation')
    @include('../includes/navigation')
@stop
 
@section('content')
	<div class="container" id="admin-panel">
		<div class="col-md-12" id="admin-container">
			<div class="section col-md-12">
				<h2 class="section-title">User Requests</h2>
				@if( count($pendings) < 1 )
				<h4>No Pending User Requests</h4>
				@endif

				@foreach($pendings as $pending)
				<div class="col-md-4 request-panel-wrapper">
					<div class="col-md-12 request-panel">
					<div class="col-md-12">
						<div class="user">
							<h4>{{ $pending->fname }} {{ $pending->mname }} {{ $pending->lname }}</h4>
							<hr>
							<p>
							Student Number: {{ $pending->studno }}<br>
							Email: {{ $pending->email }}<br>
							Username: {{ $pending->username }} <br>
							Department: {{ $pending->department }}<br>
							Batch: {{ $pending->batch }}<br>
							</p>
						</div>
					</div>
					<div class="col-md-12 designation">
					{!! Form::open(['url' => 'admin/evaluate']) !!}

						<p class="label">Select Position:</p><br>
							<select name="position" class="form-control">
								<option value="Member">Member</option>
								<option value="Committee Head">Committee Head</option>
								<option value="Overall Activity Head">Overall Activity Head</option>
							</select>
						<p class="label">Select Committee:</p><br>
							<select name="comm_id" class="form-control">
								@foreach($committee as $cmte)
								<option value="{{ $cmte->id }}">{{ $cmte->name }}</option>
								@endforeach
							</select>
						<p class="label">Evaluation:</p><br>
							<select name="evaluation" class="form-control">
								<option value="true">Approved</option>
								<option value="false">Denied</option>
							</select>
					</div>

					<div class="col-md-12 designation">
						<input type="hidden" name="user_id" value="{{ $pending->id }}"> 
						{!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
					</div>
					{!! Form::close() !!}
					</div>
				</div>
			@endforeach
			</div>

			<div class="section col-md-12">
				<h2 class="section-title">Summary</h2>
		        @include('admin\data')
			</div>

		</div>
	</div>
@stop
