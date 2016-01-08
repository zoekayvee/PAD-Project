<div class="col-md-3 cards">
    <div>
        <h3>{{ $task->title }}</h3>
        <h5>Due: {{ $task->deadline }}</h5>
        <p>{{{ $task->description }}}</p>
    </div>
    <div>
        <div class="form-group">
            <label class="">Percentage done</label>
            <input class="form-control" id="progress" placeholder="%">
            <button class="btn btn-primary" onclick="changeProgress()">Done</button>
        </div>

        <div id="canvas-holder">
            <canvas id="chart-area"/>
        </div>
    </div>
</div>