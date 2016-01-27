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
        @include('../includes/profileInfo')
    </div>
    <div class="container tasks">
      <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation"><a href="#tasks" aria-controls="tasks" role="tab" data-toggle="tab">Tasks</a></li>
        </ul>

      <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in" id="tasks">
                <div class="row section">
                    @if(count($tasks)>0)
                        @foreach ($tasks as $task)
                            @include('../includes/individualTasks')
                        @endforeach
                    @else
                        <p>No assigned Tasks</p>
                    @endif
                </div>     
            </div>
        </div>
    </div>
    
@stop
