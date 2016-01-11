@extends('template')

@section('title')
    Create Task
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
		<h4>Create a Task</h4>

		{!! Form::open(['url' => 'task']) !!}
        
        <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'e.g. Venue Permit'], 'required') !!}
		</div>

		<div class="form-group">
        {!! Form::label('description', 'Description:') !!}
        {!! Form::textarea('description', null, ['class' => 'form-control'], 'required') !!}
		</div>

        <div class="form-group">
        {!! Form::label('progress', 'Progress:') !!}
        {!! Form::number('progress', 0, ['class' => 'form-control', 'min' => '0', 'max' => '100'], 'required') !!}
        </div>

        <div class="form-group">
        {!! Form::label('weight', 'Weight: (1 - lowest ; 5 - highest)') !!}
        {!! Form::number('weight', 1, ['class' => 'form-control', 'min' => '1', 'max' => '5'], 'required') !!}
        </div>

        <div class="form-group">
        {!! Form::label('deadline', 'Deadline:') !!}
        {!! Form::input('date', 'deadline', date('Y-m-d'), ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
        {!! Form::label('remark', 'Remark:') !!}
        {!! Form::select('remark', $categories, ['class' => 'form-control']) !!}
		</div>

        <div class="form-group">
        {!! Form::label('created_date', 'Date Created:') !!}
        {!! Form::input('date', 'created_date', date('Y-m-d'), ['class' => 'form-control', 'disabled' => 'disabled']) !!}
		</div>

        <div class="form-group">
        {!! Form::hidden('createdby_id', $curr_user['id'], ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
        {!! Form::label('assigned_to','Assigned To') !!}
        	<br>
        	{!! Form::radio('assigned_to', $curr_user['id'], ['class'=>'btn btn-default']) !!} {{ $curr_user->username }}<br>
    		@foreach($users as $user)
    		{!! Form::radio('assigned_to', $user['id'], ['class'=>'btn btn-default']) !!} {{ $user->username }}
    		<br>
			@endforeach    
        </div>

         <div class="form-group">
        {!! Form::label('comm_id','Committee:') !!}
            @foreach($events as $event)
                <h6><b>{{$event->title}} :: {{$event->theme}}</b></h6>
                @foreach($committees as $committee)

                    @if($committee->event_id == $event->id)
                    &nbsp;&nbsp;&nbsp;&nbsp;{!! Form::radio('comm_id', $committee['id'], ['class'=>'btn btn-default']) !!} {{ $committee->name }}
                    <br>
                    @endif

                @endforeach    

            @endforeach    

        </div>

        {!! Form::submit('Create Task', ['class' => 'btn btn-primary form-control']) !!}
        <br><br><br>
		{!! Form::close() !!}
	</div>
@stop