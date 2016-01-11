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
            <a href="/task">
                <div class="col-md-3">           
                    <div class="button">CREATE TASK</div>
                </div>
            </a>
        </div>
        <div class="row">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#comm"><h3>Committee Tasks</h3></a></li>
                <li role="presentation"><a href="#tsk"><h3>Personal Tasks</h3></a></li>
                @foreach ($head_committees as $committee)
                    <li role="presentation"><a href="#"><h3>{{$committee->name}}</h3></a></li>
                @endforeach
            </ul>         
        </div>
        <div id="comm" class="row">         
            @foreach ($head_committees as $committee)
                @include('../includes/committeeTasks');
            @endforeach
        </div> 
        <div id='tsk' class="row">
            @if(count($tasks) > 0)
                @foreach ($tasks as $task)
                    @include('../includes/individualTasks')
                @endforeach
            @else 
                <p>No assigned task</p>
            @endif
        <div> 
        <div class="row"> 
            <br><br><br>        
            @foreach ($head_committees as $committee)
                @foreach ($all_tasks as $task)
                    @if($task->comm_id == $committee->id)
                        @include('../includes/individualTasks')
                    @endif
                @endforeach
            @endforeach
        </div> 
    </div>
@stop
