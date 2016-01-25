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
		<a data-toggle="modal" data-target="#event">
			<button class="btn btn-default create-button">+</button>		
		</a>

		<!-- Modal -->
		<div class="modal fade" id="event" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Create Event</h4>
                    </div>
                    <div class="modal-body">
                        <div>
							{!! Form::open(['url' => 'admin/event']) !!}

					        <div class="form-group">
					        {!! Form::label('title','Event') !!}
					        <br>
					        {!! Form::radio('title', 'Get 1/4' , ['class'=>'btn btn-default']) !!} Get 1/4
					        <br>
					        {!! Form::radio('title', 'PFJF' , ['class'=>'btn btn-default']) !!} PFJF
					        </div>
					        
					        <div class="form-group">
					        {!! Form::label('theme', 'Theme:') !!}
					        {!! Form::text('theme', null, ['class' => 'form-control', 'placeholder' => 'Overclocked']) !!}
							</div>

					        <div class="form-group">
					        {!! Form::label('year', 'Year:') !!}
					        {!! Form::number('year', 2016, ['class' => 'form-control', 'min' => '2005', 'max' => '2016'], 'required') !!}
					        </div>

					        <div class="form-group">
					        {!! Form::label('sem','Semester') !!}
					        <br>
					        {!! Form::radio('sem', 'First Semester' , ['class'=>'btn btn-default']) !!} First Semester
					        <br>
					        {!! Form::radio('sem', 'Second Semester' , ['class'=>'btn btn-default']) !!} Second Semester
					        </div>


					        <div class="form-group">
					        {!! Form::label('oah_id','OAH') !!}
					        	<br>
					    		@foreach($users as $user)
					    		{!! Form::radio('oah_id', $user['id'], ['class'=>'btn btn-default']) !!} {{ $user->username }}
					    		<br>
								@endforeach    
					        </div>

					        {!! Form::submit('Create Event', ['class' => 'btn btn-primary form-control']) !!}
							{!! Form::close() !!}
						</div>
                    </div>
                </div>
            </div>
        </div>

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

		<a data-toggle="modal" data-target="#committee">
			<button class="btn btn-default create-button">+</button>		
		</a>

		<!-- Modal -->
		<div class="modal fade" id="committee" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Create Committee</h4>
                    </div>
                    <div class="modal-body">
                       	<div>
							{!! Form::open(['url' => 'admin/committee']) !!}

					        <div class="form-group">
					        {!! Form::label('name','Name') !!}
					        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Visuals Committee']) !!}
					        </div>

					        <div class="form-group">
					        {!! Form::label('event_id','Event') !!}
					        	<br>
					    		@foreach($events as $event)
					    		{!! Form::radio('event_id', $event['event_id'], ['class'=>'btn btn-default']) !!} {{ $event->title }} :: {{ $event->theme }}
					    		<br>
								@endforeach    
					        </div>

					        {!! Form::submit('Create Committee', ['class' => 'btn btn-primary form-control']) !!}
							{!! Form::close() !!}
						</div> 
                    </div>
                </div>
            </div>
        </div>
	
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
		<a data-toggle="modal" data-target="#head">
			<button class="btn btn-default create-button">+</button>		
		</a>

		<!-- Modal -->
		<div class="modal fade" id="head" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Assign Head</h4>
                    </div>
                    <div class="modal-body">
                        <div>
							{!! Form::open(['url' => 'admin/head']) !!}

					        <div class="form-group">
					        {!! Form::label('position','Position') !!}
					        {!! Form::text('position', null, ['class' => 'form-control', 'placeholder' => 'Visuals Committee Head']) !!}
					        </div>

					        <div class="form-group">
					        {!! Form::label('user_id','Who?') !!}
					        	<br>
					    		@foreach($users as $user)
					    		{!! Form::radio('user_id', $user['id'], ['class'=>'btn btn-default']) !!} {{ $user->username }}
					    		<br>
								@endforeach    
					        </div>

					        <br><br>
					        <div class="form-group">
					        {!! Form::label('event_id','What Event?') !!}
					            <br>
					            @foreach($events as $event)
					            {!! Form::radio('event_id', $event['event_id'], ['class'=>'btn btn-default']) !!} {{ $event->title }} :: {{ $event->theme }}
					            <br>
					            @endforeach    
					        </div>
					        
					        <br><br>
					        <div class="form-group">
					        {!! Form::label('comm_id','What Committee?') !!}
					            @foreach($events as $event)
					                <h6><b>{{$event->title}} :: {{$event->theme}}</b></h6>
					                @foreach($committees as $committee)

					                    @if($committee->event_id == $event->event_id)
					                    &nbsp;&nbsp;&nbsp;&nbsp;{!! Form::radio('comm_id', $committee['comm_id'], ['class'=>'btn btn-default']) !!} {{ $committee->name }}
					                    <br>
					                    @endif

					                @endforeach    

					            @endforeach    

					        </div>

					        {!! Form::submit('Assign Head', ['class' => 'btn btn-primary form-control']) !!}
							{!! Form::close() !!}
						</div>
                    </div>
                </div>
            </div>
        </div>
	
	</div>

</div>