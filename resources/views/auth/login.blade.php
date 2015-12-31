@extends('template') 

@section('includes')
<!-- replaces @yield('includes') on the template html, see \resources\views\template.blade.php -->
    <link rel="stylesheet" type="text/css"
          href="{{ asset('/css/main.css') }}">
@stop

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Login</div>
				<div class="panel-body">

					@if($errors->any())
						<ul class="alert alert-danger">
							@foreach($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
					@endif

					{!! Form::open(['url' => 'account/login']) !!}

					<div class="form-group">
					{!! Form::label('email', 'Email:') !!}
					{!! Form::email('email', null, ['class' => 'form-control']) !!}

					<br>
					{!! Form::label('password', 'Password:') !!}
					{!! Form::password('password', null, ['class' => 'form-control']) !!}
					</div>

					<br>
					{!! Form::submit('Login', ['class' => 'btn btn-primary form-control']) !!}

					{!! Form::close() !!}

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
