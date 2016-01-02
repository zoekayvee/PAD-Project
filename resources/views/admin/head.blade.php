@extends('template')

@section('title')
Create Committee Head
@stop

@section('includes')
  <link rel="stylesheet" type="text/css"
    href="{{ asset('/css/main.css') }}">
@stop

@section('content')
	<div class="container">
		<h4>Assign Head:</h4>

		{!! Form::open(['url' => 'admin/head']) !!}

        <div class="form-group">
        {!! Form::label('position','Position') !!}
        {!! Form::text('position', null, ['class' => 'form-control', 'placeholder' => 'Visuals Committee Head']) !!}
        </div>

        <div class="form-group">
        {!! Form::label('user_id','Who?') !!}
        	<br>
    		@foreach($users as $user)
    		{!! Form::radio('user_id', $user['id'], ['class'=>'btn btn-default']) !!} {{ $user->username }}
    		<br>
			@endforeach    
        </div>

        <br><br>
        <div class="form-group">
        {!! Form::label('event_id','What Event?') !!}
            <br>
            @foreach($events as $event)
            {!! Form::radio('event_id', $event['event_id'], ['class'=>'btn btn-default']) !!} {{ $event->title }} :: {{ $event->theme }}
            <br>
            @endforeach    
        </div>
        
        <br><br>
        <div class="form-group">
        {!! Form::label('comm_id','What Committee?') !!}
            @foreach($events as $event)
                <h6><b>{{$event->title}} :: {{$event->theme}}</b></h6>
                @foreach($committees as $committee)

                    @if($committee->event_id == $event->event_id)
                    &nbsp;&nbsp;&nbsp;&nbsp;{!! Form::radio('comm_id', $committee['comm_id'], ['class'=>'btn btn-default']) !!} {{ $committee->name }}
                    <br>
                    @endif

                @endforeach    

            @endforeach    

        </div>



        {!! Form::submit('Create Event', ['class' => 'btn btn-primary form-control']) !!}
        <br><br><br>
		{!! Form::close() !!}
	</div>

@stop
