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
    <div class="container">
        <div class="row">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" id="nav-comm"><a href="#"><h3>Committee</h3></a></li>
                <li role="presentation" id="nav-tsk"><a href="#"><h3>Personal Tasks</h3></a></li>
            </ul>         
        </div>
        <div id="tasks" class="row">
            <div id="commi" class="row">
                <a href="/task">
                    <div class="col-md-2 addTask">       
                        +
                    </div>
                </a>

                @foreach ($head_committees as $committee)
                    @foreach ($all_tasks as $task)
                        @if($task->comm_id == $committee->id)
                            @include('../includes/head_committeeTasks')
                        @endif
                    @endforeach
                @endforeach

                
            </div> 
            <div id="tsk" class="row">
                @if(count($tasks) > 0)
                    @foreach ($tasks as $task)
                        @include('../includes/individualTasks')
                    @endforeach
                @else 
                    <p>No assigned task</p>
                    <!-- Di po gumana -->
                @endif
            </div>             
        </div>
    </div>
@stop


<!-- Kapag nasa committee tasks, ang lalabas ay yung individual tasks na may kasamang detail kung kanino inassign, pero pag personal task, individual task din sya pero walang detail kung kanino inassign, kasi sakanya naman yung task eh -->
<!-- Yung committee task, sa page ng OAH nakalagay kasi nakasummarize sa kanyayung tasks ng lahat ng committees -->
<!-- Regarding dun sa Para malaman kung anong position nya, nakaindicate na sya sa table, and kapag na-click na yung even na gusto nyang puntahan, maeemphasize nalang, feeling ko kasi noticeable na sya sa taas, tingin nyo? -->