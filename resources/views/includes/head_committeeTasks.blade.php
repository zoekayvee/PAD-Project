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

        <div id="canvas-holder">
            <canvas class="chart-area"/>
        </div>
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