<div class="col-md-12" id="summary-panel">
	<div class="col-md-12 table-wrapper">
		<table class="table table-condensed table-striped" id="events-table">
		<thead>
			<th>Event</th>
			<th>Title</th>
			<th>Theme</th>
			<th>Semester</th>
			<th>Year</th>
			<th>Weight</th>
			<th>OAH</th>
		</thead>
		@foreach($events as $event)
		<tr>
			<td>{{ $event->id }}</td>
			<td>{{ $event->title }}</td>
			<td>{{ $event->theme }}</td>
			<td>{{ $event->sem }}</td>
			<td>{{ $event->year }}</td>
			<td>{{ $event->weight }}</td>

		<?php
			$oah = $users->where('id', $event->oah_id)->first();
		?>
			<td>{{ $oah->fname }} {{ $oah->lname }}</td>
		</tr>
		@endforeach
		</table>
		<a href="/admin/event">
			<button class="btn btn-default create-button">+</button>		
		</a>
	</div>

	<div class="col-md-12 table-wrapper" id="committees-table">
		<table class="table table-condensed table-striped">
		<thead>
			<th>Committee</th>
			<th>Name</th>
			<th>Weight</th>
			<th>Event ID (foreign)</th>
		</thead>
		@foreach($committees as $committee)
		<tr>
			<td>{{ $committee->id }}</td>
			<td>{{ $committee->name }}</td>
			<td>{{ $committee->weight }}</td>

		<?php
			$event_what = $events->where('id', $committee->event_id)->first();
		?>			
			<td>{{ $event_what->title }}, {{ $event_what->year }}</td>
		</tr>
		@endforeach
		</table>

		<a href="/admin/committee">
			<button class="btn btn-default create-button">+</button>		
		</a>
	</div>

	<div class="col-md-12 table-wrapper" id="heads-table">
		<table class="table table-condensed table-striped">
		<thead>
			<th>Head</th>
			<th>Position</th>
			<th>User</th>
			<th>Committee</th>
			<th>Event</th>

		</thead>
		@foreach($heads as $head)
		<tr>
			<td>{{ $head->id }}</td>
			<td>{{ $head->position }}</td>

			<?php
				$head_user = $users->where('id', $head->user_id)->first();
				$head_comm = $committees->where('id', $head->comm_id)->first();
				$head_event = $events->where('id', $head->event_id)->first();
			?>			

			<td>{{ $head_user->fname }} {{ $head_user->lname }}</td>
			<td>{{ $head_comm->name }}</td>
			<td>{{ $head_event->title }}, {{ $head_event->year }}</td>
		</tr>
		@endforeach
		</table>
		<a href="/admin/head">
			<button class="btn btn-default create-button">+</button>		
		</a>
	</div>

</div>