@extends('template')

@section('title')
    OAH
@stop

@section('includes')
    <link rel="stylesheet" type="text/css"
          href="{{ asset('/css/profile.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('/css/task_progress.css') }}">
    <script type="text/javascript"
        src="{{ asset('/js/task.js') }}">
    </script>
@stop

@section('navigation')
    @include('../includes/navigation')
@stop

@section('content')
    <div class="container" id="temp">
        @include('../includes/profileInfo')
    </div>
    <div class="container">
      <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            @foreach ($committees as $committee)
                <li role="presentation"><a href="#{{$committee->id}}" aria-controls="{{$committee->id}}" role="tab" data-toggle="tab">{{$committee->name}}</a></li>
            @endforeach
            
        </ul>
        </div>
    <div class="container tasks">

      <!-- Tab panes -->
        <div class="tab-content">
            @foreach ($committees as $committee)
                <div role="tabpanel" class="tab-pane fade in" id="{{$committee->id}}">
                    <div class="row section">
                        @foreach ($all_tasks as $task)
                            @if($task->comm_id == $committee->id)
                                @include('../includes/head_committeeTasks')
                            @endif
                        @endforeach
                    </div>     
                </div>
            @endforeach
            

        </div>
    </div>
@stop

<!-- Yung sa OAH, diba may panels ng laat ng committees, ididisplay dun yung tasks by committee. Tapos pwede din syang mag add ng task dun sa committee, pero sa head lang ng committee na yun. -->