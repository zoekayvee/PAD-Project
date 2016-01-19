<!--    WORKING

@section('includes')
  <?php
    $task_progress = $task->progress;
  ?>

@stop


<script type="text/javascript">
    var pieData = [
        {
            value: {!! $task_progress !!},
            color:"#F7464A",
            highlight: "#FF5A5E",
            label: "Completed"
        },
        {
            value: {!! 100 - $task_progress !!},
            color: "#46BFBD",
            highlight: "#5AD3D1",
            label: "On the process"
        }
    ];

        var elements = document.getElementsByClassName('chart-area');
        for (var i = 0; i < elements.length; i++) {
            var ctx = elements[i].getContext("2d");
            window.myPie = new Chart(ctx).Pie(pieData);
        }


    $.getScript("/js/taskChart.js");
</script> 
-->


<!--
@section('includes')
  <?php
    $task_progress = $task->progress;
  ?>

@stop


<script type="text/javascript">
    var task_progress = {!! $task_progress !!}
    $.getScript("/js/taskChart.js");
</script>
-->

@section('includes')
    <?php
        $task_progress = $task->progress;
    ?>

    <link rel="stylesheet" type="text/css"
        href="{{ asset('/css/task_progress.css') }}">
@stop

<div class="col-md-3 cards">
    <div>
        <h3>{{ $task->title }}</h3>
        @foreach ($users as $assigned_to)
            @if($task->assigned_to == $assigned_to->id)
                <h5>Assigned to: {{ $assigned_to->username }}</h5>
            @endif
        @endforeach
        <h5>Due: {{ $task->deadline }}</h5>
        <p>Description: <br> {{{ $task->description }}}</p>
    </div>
    <div>
        <div>
            @for ($i = 3; $i >= 0; $i--)
                @if($task->remark == $i)
                    <h5>Status: {{ $categories[$i] }}</h5>
                @endif
            @endfor
            <h5>Progress: {{ $task->progress }}%</h5>
        </div>

        <div class="progress">
            <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="{{ $task_progress }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $task_progress }}%"><span class="">{{ $task_progress }}%</span></div>
        </div>

        <!--<div id="canvas-holder">
            <canvas class="chart-area"/>
        </div> -->
    </div>
    <!--=========================== COMMENT ================================== -->
    <div>
        <br><h5>COMMENTS</h5>
        @foreach ($comments as $comment)
            @if($task->id == $comment->task_id)
                <hr>
                @foreach ($users as $createdby)
                    @if($createdby->id == $comment->user_id)
                        <h5>{{ $createdby->username }}:</h5>
                    @endif
                @endforeach
                <p>{{{ $comment->description }}}</p>
            @endif
        @endforeach
    </div><hr>
    <div class="form-group">
        <!--ADD COMMENT-->
        {!! Form::open(['url' => 'profile']) !!}

        <div class="form-group">
        {!! Form::hidden('user_id', $user['id'], ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
        {!! Form::hidden('task_id', $task['id'], ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
        {!! Form::label('description', 'Comment') !!}
        {!! Form::textarea('description', null, ['class' => 'form-control'], 'required') !!}
        </div>
        {!! Form::submit('Comment', ['class' => 'btn btn-primary form-control']) !!}
        {!! Form::close() !!}
    </div>
</div>