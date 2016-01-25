
@section('includes')
    <?php
        $task_progress = $task->progress;
    ?>
@stop

<div class="col-md-3 cards">
    <div class="col-md-12 card-header">
        <h3 class="section-title">{{ $task->title }}</h3>
    </div>
    <div class="card-body">
        <p>{{{ $task->description }}}</p>
        @foreach ($users as $assigned_to)
            @if($task->assigned_to == $assigned_to->id)
                <h5>Assigned to: <span class="section-title">{{ $assigned_to->username }}</span></h5>
            @endif
        @endforeach
        <h5>Due:<span class="section-title"> {{ $task->deadline }}</span></h5>
        
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
        </div>

        <!--DELETE TASK-->
            {!! Form::open(['method' => 'DELETE', 'route'=>['profile.destroy', $task->id]]) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}


        <!-- ========== COMMENT =========== -->
        <div>
            <h4 class="section-title">COMMENTS</h4>
            @foreach ($comments as $comment)
                @if($task->id == $comment->task_id)
                    @foreach ($users as $createdby)
                        @if($createdby->id == $comment->user_id)
                            <h5>{{ $createdby->username }}:</h5>
                        @endif
                    @endforeach
                    <p>{{{ $comment->description }}}</p>
                @endif
            @endforeach
        </div>
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
                <textarea class"textArea" name="description" required></textarea>
            </div>
            {!! Form::submit('Add Comment', ['class' => 'btn btn-primary form-control']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>