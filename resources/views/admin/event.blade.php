@extends('template')

@section('title')
Create Event
@stop

@section('includes')
  <link rel="stylesheet" type="text/css"
    href="{{ asset('/css/main.css') }}">
@stop

@section('content')
	<div class="container">
		<h4>Create an Event:</h4>

		{!! Form::open(['url' => 'admin/event']) !!}

        <div class="form-group">
        {!! Form::label('title','Sex') !!}
        <br>
        {!! Form::radio('title', 'Get 1/4' , ['class'=>'btn btn-default']) !!} Get 1/4
        <br>
        {!! Form::radio('title', 'PFJF' , ['class'=>'btn btn-default']) !!} PFJF
        </div>
        
        <div class="form-group">
        {!! Form::label('theme', 'Theme:') !!}
        {!! Form::text('theme', null, ['class' => 'form-control', 'placeholder' => 'Overclocked']) !!}
		</div>

        <div class="form-group">
        {!! Form::label('year', 'Year:') !!}
        {!! Form::number('year', 2016, ['class' => 'form-control', 'min' => '2005', 'max' => '2016'], 'required') !!}
        </div>

        <div class="form-group">
        {!! Form::label('sem','Semester') !!}
        <br>
        {!! Form::radio('sem', 'First Semester' , ['class'=>'btn btn-default']) !!} First Semester
        <br>
        {!! Form::radio('sem', 'Second Semester' , ['class'=>'btn btn-default']) !!} Second Semester
        </div>


        <div class="form-group">
        {!! Form::label('oah_id','Semester') !!}
        	<br>
    		@foreach($users as $user)
    		{!! Form::radio('oah_id', $user['id'], ['class'=>'btn btn-default']) !!} {{ $user->username }}
    		<br>
			@endforeach    
        </div>

        {!! Form::submit('Create Event', ['class' => 'btn btn-primary form-control']) !!}
        <br><br><br>
		{!! Form::close() !!}
	</div>

@stop
