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
    <div>
        <div class="form-group">
            <label class="">Percentage done</label>
            <input class="form-control" placeholder="%">
            <button class="btn btn-primary" href="#">Done</button>
        </div>

        <div id="canvas-holder">
            <canvas id="chart-area"/>
        </div>
    </div>
</div>