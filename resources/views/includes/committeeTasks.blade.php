<div class="col-md-4 cards">
    <div>
        <h3>{{ $committee->name }}</h3>
        <ul>
            @foreach ($all_tasks as $task)
                @if($task->comm_id == $committee->id)
                    <li>{{ $task->title }}</li>
                    @foreach ($users as $assigned_to)
                        @if($task->assigned_to == $assigned_to->id)
                            <p>Assigned to: {{ $assigned_to->username }}</p>
                        @endif
                    @endforeach
                <br>
                @endif
            @endforeach
        </ul>
    </div>
</div>