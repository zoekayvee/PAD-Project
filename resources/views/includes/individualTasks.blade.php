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
        <h5>Due:<span class="section-title"> {{ $task->deadline }}</span></h5>
        
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

            </div>

            <div class="progress">
                <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="{{ $task_progress }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $task_progress }}%"><span class="">{{ $task_progress }}%</span></div>
            </div>
        </div>
        <!--============ COMMENT ============= -->
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