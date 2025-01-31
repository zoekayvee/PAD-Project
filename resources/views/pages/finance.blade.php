@extends('template')

@section('title')
	Fin Utang
@stop

@section('includes')
    <link rel="stylesheet" type="text/css"
          href="{{ asset('/css/main.css') }}">

    <link rel="stylesheet" type="text/css"
          href="{{ asset('/css/finance.css') }}">

@stop

@section('navigation')
    @include('../includes/navigation')
@stop

@section('content')
	<div class="container" id="finance-container">
		<div class="col-md-12">
			<h2 class="section-title">Balance Sheet </h2>
			@foreach($users as $member)
			@if($member->standing != 'admin')
			<div class="col-md-2 utang-card-wrapper">
				<?php
					$with_balance = false;
					if($member->debt > 0) $with_balance = true;
				?>

				@if($with_balance)
					<div class="col-md-12 utang-card card with-balance">	
				@endif

				@if(!$with_balance)
					<div class="col-md-12 utang-card card">	
				@endif

					<div class="utang-card-head">
						<h4>{{ $member->lname }}, {{ $member->fname[0] }}.</h4>
					</div>	
					<?php
						$url = '/balance/' . $member->id;
					?>
		
					<div class="utang-card-body">
						{!! Form::open(['url' => $url]) !!}
						<input type="num" name="value" value="{{ $member->debt }}" class="form-control" required/>
						{!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
						{!! Form::close() !!}						

					</div>
		
		
				</div>
			</div>
			@endif
			@endforeach
		</div>
	</div>
@stop