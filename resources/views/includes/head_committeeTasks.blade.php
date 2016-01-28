
@section('includes')
    <?php
        $task_progress = $task->progress;
    ?>
@stop

<div class="col-md-3">
    <div class="cards">
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
                <h5>Status: {{ $task->remark }}</h5>
                <h5>Progress: {{ $task->progress }}%</h5>
            </div>

            <div class="progress">
                <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="{{ $task_progress }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $task_progress }}%"><span class=""> {{ $task_progress }}%</span></div>

            </div>

            <!--DELETE TASK-->
                {!! Form::open(['method' => 'DELETE', 'route'=>['profile.destroy', $task->id]]) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}


            <!-- ========== COMMENT =========== -->
            <a class="section-title" data-toggle="modal" data-target="#{{$task->id}}">Comments</a>
            <div class="modal fade" id="{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Comments</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="show-comments">
                                        @foreach ($comments as $comment)
                                        <div class="col-md-12 comments-cont">
                                            @if($task->id == $comment->task_id)
                                                @foreach ($users as $createdby)
                                                    @if($createdby->id == $comment->user_id)
                                                        <h5 class="section-title">{{ $createdby->username }}: </h5>
                                                    @endif
                                                @endforeach
                                                {{{ $comment->description }}}
                                            @endif
                                        </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="col-md-12 input-comment">
                                        <!--ADD COMMENT-->
                                        {!! Form::open(['url' => 'profile']) !!}
                                            {!! Form::hidden('user_id', $user['id'], ['class' => 'form-control']) !!}
                                            {!! Form::hidden('task_id', $task['id'], ['class' => 'form-control']) !!}
                                            <br>
                                            <div class="col-md-12">
                                                {!! Form::textarea('description', null, ['class' => 'text-area'], 'required') !!}
                                            </div>
                                            <div class="col-md-12">
                                                {!! Form::submit('>', ['class' => 'btn btn-primary btn-comment']) !!}
                                            </div>
                                        {!! Form::close() !!}
                                            <br><br>                                            <br><br>

                                     </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                