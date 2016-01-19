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
        <h5>Due: {{ $task->deadline }}</h5>
        <p>{{{ $task->description }}}</p>
    </div>
    <div>
        <div class="form-group">
            <!--UPDATE PROGRESS-->
            {!! Form::model($task,['method' => 'PATCH','route'=>['profile.update',$task->id]]) !!}
            
            <div class="form-group">
            {!! Form::label('remark', 'Status') !!}
            {!! Form::select('remark', $categories, $task->remark) !!}
            </div>
            <div class="form-group">
            {!! Form::label('progress', 'Percentage done') !!}
            {!! Form::text('progress', null, ['class' => 'form-control', 'placeholder' => $task->progress], 'required') !!}
            </div>
            {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
            {!! Form::close() !!}

            <!--DELETE TASK-->
            {!! Form::open(['method' => 'DELETE', 'route'=>['profile.destroy', $task->id]]) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}

            <!--
            <br><br><br>
            <label class="">Percentage done</label>
            <input class="form-control" id="progress" placeholder="{{ $task->progress }} %">
            <button class="btn btn-primary" onclick="changeProgress()">Done</button>
            -->
        </div>

        <div class="progress">
            <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="{{ $task_progress }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $task_progress }}%"><span class="">{{ $task_progress }}%</span></div>
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