@extends('template')

@section('title')
	Fin Utang
@stop

@section('includes')
    <link rel="stylesheet" type="text/css"
          href="{{ asset('/css/finance.css') }}">
@stop

@section('navigation')
    @include('../includes/navigation')
@stop

@section('content')
	<div class="container" id="finance-container">
		<div class="col-md-12">
			@foreach($users as $member)
			@if($member->standing != 'admin')
			<div class="col-md-2 utang-card-wrapper">
				<div class="col-md-12 utang-card card">			
					{{ $member->lname }}, {{ $member->fname[0] }}.
					<h2>{{ $member->debt }}</h2>
					<form>
						<label name="value"></label>
						<input type="text" name="value" class="form-control"/>
						<input type="submit" value="UPDATE" class="btn btn-primary">
					</form>
				</div>
			</div>
			@endif
			@endforeach
		</div>
	</div>

@stop