@extends('template')

@section('title')
    OAH
@stop

@section('includes')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('/css/main.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('/css/profile.css') }}">
@stop

@section('navigation')
    @include('../includes/navigation')
@stop

@section('content')
    <div class="container">
        @include('../includes/profileInfo')
    </div>
    <div class="container">
        <div class="row ">
            <h1 class="page-header">Tasks</h1>
            <!-- Will only be visible if a task is given,
                otherwise, put "No assigne task/s" -->
            @foreach ($committees as $committee)
                @include('../includes/committeeTasks');
            @endforeach
    </div>
@stop