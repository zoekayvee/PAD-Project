@extends('template')

@section('title')
    Lower Heads
@stop

@section('includes')
    <link rel="stylesheet" type="text/css"
          href="{{ asset('/css/profile.css') }}">
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
            <li role="presentation" class="active"><a href="#committee" aria-controls="home" role="tab" data-toggle="tab">Committee</a></li>
            <li role="presentation"><a href="#tasks" aria-controls="tasks" role="tab" data-toggle="tab">Tasks</a></li>
        </ul>

      <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in" id="tasks">
                <div class="row">
                    @if(count($tasks)>0)
                        @foreach ($tasks as $task)
                            @include('../includes/individualTasks')
                        @endforeach
                    @else
                        <p>No assigned Tasks</p>
                    @endif
                </div>     
            </div>
            <div role="tabpanel" class="tab-pane active fade in" id="committee">
                <div class="row">
                    <div class="col-md-3"> 
                        <div class="addTask" type="button" data-toggle="modal" data-target="#myModal">+</div>
                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Create Task</h4>
                                    </div>
                                    <div class="modal-body">
                                        @include('../includes/createTask')
                                    </div>
                                </div>
                            </div>
                        </div>

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
    </div>
@stop