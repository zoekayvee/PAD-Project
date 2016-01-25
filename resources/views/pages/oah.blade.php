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
    <div class="container tasks">
      <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#secretariat" aria-controls="secretariat" role="tab" data-toggle="tab">Secretariat</a></li>
            <li role="presentation"><a href="#programs" aria-controls="programs" role="tab" data-toggle="tab">Programs</a></li>
            <li role="presentation"><a href="#finance" aria-controls="finance" role="tab" data-toggle="tab">Finance</a></li>
            <li role="presentation"><a href="#visuals" aria-controls="visuals" role="tab" data-toggle="tab">Visuals</a></li>
            <li role="presentation"><a href="#technicals" aria-controls="technicals" role="tab" data-toggle="tab">Technicals</a></li>
            <li role="presentation"><a href="#promotions" aria-controls="promotions" role="tab" data-toggle="tab">Promotions</a></li>
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
            <div role="tabpanel" class="tab-pane active fade in" id="secretariat">
                <div class="row">
                    @foreach ($head_committees as $committee)
                        @foreach ($all_tasks as $task)
                            @if($task->comm_id == $committee->id)
                                @include('../includes/head_committeeTasks')
                            @endif
                        @endforeach
                    @endforeach 
                </div>     
            </div>
            <div role="tabpanel" class="tab-pane fade in" id="programs">
                <div class="row">
                    @foreach ($head_committees as $committee)
                        @foreach ($all_tasks as $task)
                            @if($task->comm_id == $committee->id)
                                @include('../includes/head_committeeTasks')
                            @endif
                        @endforeach
                    @endforeach 
                </div> 
            </div>
            <div role="tabpanel" class="tab-pane fade in" id="finance">
                <div class="row">
                    @foreach ($head_committees as $committee)
                        @foreach ($all_tasks as $task)
                            @if($task->comm_id == $committee->id)
                                @include('../includes/head_committeeTasks')
                            @endif
                        @endforeach
                    @endforeach 
                </div> 
            </div>
            <div role="tabpanel" class="tab-pane fade in" id="visuals">
                <div class="row">
                    @foreach ($head_committees as $committee)
                        @foreach ($all_tasks as $task)
                            @if($task->comm_id == $committee->id)
                                @include('../includes/head_committeeTasks')
                            @endif
                        @endforeach
                    @endforeach 
                </div> 
            </div>
            <div role="tabpanel" class="tab-pane fade in" id="technicals">
                <div class="row">
                    @foreach ($head_committees as $committee)
                        @foreach ($all_tasks as $task)
                            @if($task->comm_id == $committee->id)
                                @include('../includes/head_committeeTasks')
                            @endif
                        @endforeach
                    @endforeach 
                </div> 
            </div>
            <div role="tabpanel" class="tab-pane fade in" id="finance">
                <div class="row">
                    @foreach ($head_committees as $committee)
                        @foreach ($all_tasks as $task)
                            @if($task->comm_id == $committee->id)
                                @include('../includes/head_committeeTasks')
                            @endif
                        @endforeach
                    @endforeach 
                </div> 
            </div>

        </div>
    </div>
@stop

<!-- Yung sa OAH, diba may panels ng laat ng committees, ididisplay dun yung tasks by committee. Tapos pwede din syang mag add ng task dun sa committee, pero sa head lang ng committee na yun. -->