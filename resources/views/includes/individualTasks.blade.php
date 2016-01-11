<div class="col-md-3 cards">
    <div>
        <h3>{{ $task->title }}</h3>
        @foreach ($users as $assigned_to)
            @if($task->assigned_to == $assigned_to->id)
                <h5>Assigned to: {{ $assigned_to->username }}</h5>
            @endif
        @endforeach
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

        <div id="canvas-holder">
            <canvas class="chart-area"/>
        </div>
    </div>
</div>