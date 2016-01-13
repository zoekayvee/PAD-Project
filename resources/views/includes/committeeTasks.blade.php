<div class="col-md-4 cards">
    <div>
        <h3>{{ $committee->name }}</h3>
        <ul>
            @foreach ($all_tasks as $task)
                @if($task->comm_id == $committee->id)
                    <li>{{ $task->title }}</li>
                <br>
                @endif
            @endforeach
        </ul>
    </div>
</div>