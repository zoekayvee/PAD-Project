@extends('template')

@section('title')
    Lower Heads
@stop

@section('includes')
    <link rel="stylesheet" type="text/css"
          href="{{ asset('/css/profile.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('/css/main.css') }}">
@stop

@section('navigation')
    @include('../includes/navigation')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#"><h3>Committee Tasks</h3></a></li>
                    <li role="presentation"><a href="#"><h3>Personal Tasks</h3></a></li>
                  </ul>         
                @include('../includes/individualTasks')
            </div>
            @include('../includes/profileInfo')
        </div>
    </div>
@stop
