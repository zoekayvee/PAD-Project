<div class="row">
    <div class="col-md-3"> 
        <div class="addTask" type="button" data-toggle="modal" data-target="#addTaskModal">+</div>
        <!-- Modal -->
        <div class="modal fade" id="addTaskModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Create Task</h4>
                    </div>
                    <div class="modal-body">
                        @include('../includes/createTask')
                    </div>
                </div>
            </div>
        </div>

    @foreach ($head_committees as $committee)
        @foreach ($all_tasks as $task)
            @if($task->comm_id == $committee->id)
                @include('../includes/head_committeeTasks')
            @endif
        @endforeach
    @endforeach 
    </div> 
</div>