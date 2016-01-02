@extends('template')

@section('title')
Create Committee
@stop

@section('includes')
  <link rel="stylesheet" type="text/css"
    href="{{ asset('/css/main.css') }}">
@stop

@section('content')
	<div class="container">
		<h4>Create an Event:</h4>

		{!! Form::open(['url' => 'admin/committee']) !!}

        <div class="form-group">
        {!! Form::label('name','Name') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Visuals Committee']) !!}
        </div>

        <div class="form-group">
        {!! Form::label('event_id','Event') !!}
        	<br>
    		@foreach($events as $event)
    		{!! Form::radio('event_id', $event['event_id'], ['class'=>'btn btn-default']) !!} {{ $event->title }} :: {{ $event->theme }}
    		<br>
			@endforeach    
        </div>

        {!! Form::submit('Create Event', ['class' => 'btn btn-primary form-control']) !!}
        <br><br><br>
		{!! Form::close() !!}
	</div>

@stop
