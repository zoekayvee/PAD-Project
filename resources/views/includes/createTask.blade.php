{!! Form::open(['url' => 'task']) !!}
        
    <div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'e.g. Venue Permit'], 'required') !!}
    </div>

    <div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control'], 'required') !!}
    </div>

    <div class="form-group">
    {!! Form::hidden('progress', 0, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
    {!! Form::label('weight', 'Weight: (1 - lowest ; 5 - highest)') !!}
    {!! Form::number('weight', 1, ['class' => 'form-control', 'min' => '1', 'max' => '5'], 'required') !!}
    </div>

    <div class="form-group">
    {!! Form::label('deadline', 'Deadline:') !!}
    {!! Form::input('date', 'deadline', date('Y-m-d'), ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
    {!! Form::hidden('remark', 'Pending', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
    {!! Form::label('created_date', 'Date Created:') !!}
    {!! Form::input('date', 'created_date', date('Y-m-d'), ['class' => 'form-control', 'disabled' => 'disabled']) !!}
    </div>

    <div class="form-group">
    {!! Form::hidden('createdby_id', $user['id'], ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
    {!! Form::label('assigned_to','Assigned To') !!}
        <br>    
        <select name="assigned_to" class="form-control">
        <option value="{{ $user['id'] }}">              
            {{ $user->username }}
        </option>
        @foreach($members as $user)
        <option value="{{ $user['id'] }}">              
            {{ $user->username }}
        </option>
        @endforeach

        </select>
        <br>
    </div>

    <div class="form-group">
        {!! Form::hidden('event_id', $curr_event->id, ['class' => 'form-control']) !!}
    </div>

     <div class="form-group">

        @foreach($head_committees as $committee)
            @if($committee->event_id == $curr_event->id)
               {!! Form::hidden('comm_id', $committee['id'], ['class' => 'form-control']) !!} 
            @endif
        @endforeach    

    </div>

    {!! Form::submit('Create Task', ['class' => 'btn btn-primary form-control']) !!}
    <br><br><br>
    {!! Form::close() !!}
</div>