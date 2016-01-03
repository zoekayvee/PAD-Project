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
@stop

@section('content')
    <div class="container">
        @include('../includes/profileInfo')
    </div>
    <div class="container">
        <div class="row">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#"><h3>Committee Tasks</h3></a></li>
                <li role="presentation"><a href="#"><h3>Personal Tasks</h3></a></li>
              </ul>         
            @include('../includes/individualTasks')
        </div>
    </div>
@stop
