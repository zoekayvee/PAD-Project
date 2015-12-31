@extends('template')

@section('includes')
    <link rel="stylesheet" type="text/css"
          href="{{ asset('/css/main.css') }}">
@stop

@section('content')
	<div class="container">

		{!! Form::open() !!}

		{!! Form::label('title', 'Title') !!}
		{!! Form::text('title', null, ['class' => 'form-control']) !!}

		{!! Form::label('description', 'Description') !!}
		{!! Form::textarea('description', null, ['class' => 'form-control']) !!}

		{!! Form::label('deadline', 'Description') !!}
		{!! Form::text('deadline', null, ['class' => 'form-control']) !!}

		{!! Form::submit('Create', ['class'=>'btn btn-primary form-control']) !!}

		{!! Form::close() !!}

	</div>
	<br>
@stop