@extends('template')

@section('title')
    Member
@stop

@section('includes')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('/css/main.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('/css/profile.css') }}">
@stop

@section('navigation')
    @include('../includes/navigation')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <h1 class="page-header">Tasks</h1>
                @include('../includes/individualTasks')
            </div>
            @include('../includes/profileInfo')
        </div>
    </div>
@stop
