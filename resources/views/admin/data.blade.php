	<div>
		<table class="table">
		<tr>
			<th>ID</th>
			<th>First Name</th>
			<th>Middle Name</th>
			<th>Last Name</th>
			<th>Username</th>
			<th>Email</th>
			<th>Password</th>
			<th>Student Number</th>
			<th>Department</th>
			<th>YSES Batch</th>
		</tr>
		@foreach($users as $user)
		<tr>
			<td>{{ $user->id }}</td>
			<td>{{ $user->fname }}</td>
			<td>{{ $user->mname }}</td>
			<td>{{ $user->lname }}</td>
			<td>{{ $user->username }}</td>
			<td>{{ $user->email }}</td>
			<td>{{ $user->password }}</td>
			<td>{{ $user->studno }}</td>
			<td>{{ $user->department }}</td>
			<td>{{ $user->batch }}</td>
		</tr>
		@endforeach
		</table>
	</div>

	<div class="container">
		<h4>Events from the DB:</h4>
		<table class="table">
		<tr>
			<th>Event ID</th>
			<th>Title</th>
			<th>Theme</th>
			<th>Semester</th>
			<th>Year</th>
			<th>Weight</th>
			<th>OAH / User ID (foreign)</th>
		</tr>
		@foreach($events as $event)
		<tr>
			<td>{{ $event->id }}</td>
			<td>{{ $event->title }}</td>
			<td>{{ $event->theme }}</td>
			<td>{{ $event->sem }}</td>
			<td>{{ $event->year }}</td>
			<td>{{ $event->weight }}</td>
			<td>{{ $event->oah_id }}</td>
		</tr>
		@endforeach
		</table>
	</div>

	<div class="container">
		<h4>Committees from the DB:</h4>
		<table class="table">
		<tr>
			<th>Comm ID</th>
			<th>Comm Name</th>
			<th>Weight</th>
			<th>Event ID (foreign)</th>
		</tr>
		@foreach($committees as $committee)
		<tr>
			<td>{{ $committee->id }}</td>
			<td>{{ $committee->name }}</td>
			<td>{{ $committee->weight }}</td>
			<td>{{ $committee->event_id }}</td>
		</tr>
		@endforeach
		</table>
	</div>

	<div class="container">
		<h4>Heads from the DB:</h4>
		<table class="table">
		<tr>
			<th>Head ID</th>
			<th>Position</th>
			<th>Head / User ID (foreign)</th>
			<th>Comm ID (foreign)</th>
			<th>Event ID (foreign)</th>
		</tr>
		@foreach($heads as $head)
		<tr>
			<td>{{ $head->id }}</td>
			<td>{{ $head->position }}</td>
			<td>{{ $head->user_id }}</td>
			<td>{{ $head->comm_id }}</td>
			<td>{{ $head->event_id }}</td>
		</tr>
		@endforeach
		</table>
	</div>

	<div class="container">
		<h4>Tasks from the DB:</h4>
		<table class="table">
		<tr>
			<th>ID</th>
			<th>Title</th>
			<th>Description</th>
			<th>Progress</th>
			<th>Weight</th>
			<th>Deadline</th>
			<th>Remark</th>
			<th>Date Created</th>
			<th>Created By</th>
			<th>Assigned to</th>
			<th>Committee</th>
		</tr>
		
		@foreach($tasks as $task)
		<tr>
			<td>{{ $task->task_id }}</td>
			<td>{{ $task->title }}</td>
			<td>{{ $task->description }}</td>
			<td>{{ $task->progress }}</td>
			<td>{{ $task->weight }}</td>
			<td>{{ $task->deadline }}</td>
			<td>{{ $task->remark }}</td>
			<td>{{ $task->created_date }}</td>
			<td>{{ $task->createdby_id }}</td>
			<td>{{ $task->assigned_to }}</td>
			<td>{{ $task->comm_id }}</td>
		</tr>
		@endforeach
		</table>
	</div>