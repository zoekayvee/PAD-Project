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
							{!! Form::open(['url' => '/admin/event']) !!}

					        <div class="form-group">
					        {!! Form::label('title','Event') !!}
						        <select name="title" class="form-control" required>
						        	<option value="Get 1/4">Get 1/4</option>
						        	<option value="Get 1/4">PFJF</option>
						        </select>
					        </div>
					        
					        <div class="form-group">
					        {!! Form::label('theme', 'Theme:') !!}
					        {!! Form::text('theme', null, ['class' => 'form-control', 'placeholder' => 'Overclocked']) !!}
							</div>

					        <div class="form-group">
					        {!! Form::label('year', 'Year:') !!}
					        {!! Form::number('year', 2016, ['class' => 'form-control', 'min' => '2005', 'max' => '2030'], 'required') !!}
					        </div>

					        <div class="form-group">
						        {!! Form::label('sem','Semester') !!}
						        <select name="sem" class="form-control" required>
						        	<option value="First Semester">First Semester</option>
						        	<option value="Second Semester">Second Semester</option>
						        </select>
					        </div>


					        <div class="form-group">
					        {!! Form::label('oah_id','OAH') !!}
					        	<select name="oah_id" class="form-control" required>					        		
					    		@foreach($users as $user)
					    			@if($user->id != 1)
					    			<option value="{{ $user->id }}">
					    				{{ $user->lname }}
					    			</option>
					    			@endif
								@endforeach    
					        	</select>
					        </div>
					        <br>
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
							{!! Form::open(['url' => '/admin/committee']) !!}

					        <div class="form-group">
					        {!! Form::label('name','Name') !!}
					        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Visuals Committee']) !!}
					        </div>

				        	<input type="hidden" name="event_id" value="{{$event->id}}">

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
							{!! Form::open(['url' => '/admin/head']) !!}

					        <div class="form-group">
					        {!! Form::label('position','Position') !!}
					        {!! Form::text('position', null, ['class' => 'form-control', 'placeholder' => 'Visuals Committee Head']) !!}
					        </div>

					        <div class="form-group">
					        {!! Form::label('user_id','Who?') !!}
					        	<br>
					        	<select name="user_id" class="form-control">
					    		@foreach($users as $user)
					    			@if( $user->id != 1)
					        		<option value="{{ $user->id }}">
					        			{{ $user->username }}
					        		</option>
					        		@endif
								@endforeach    
					        	</select>
					        </div>

					        <input type="hidden" name="event_id" value="{{$event->id}}">

					        <div class="form-group">
					        	<?php
					        		$committee = $committees->where('event_id', $event->id);
					        	?>

						        {!! Form::label('user_id','Who?') !!}
					        	<br>
					        	<select name="comm_id" class="form-control">
					    		@foreach($committee as $comm)
					        		<option value="{{ $comm->id }}">
					        			{{ $comm->name }}
					        		</option>
								@endforeach    
					        	</select>
					        </div>

					        <br>

					        {!! Form::submit('Assign Head', ['class' => 'btn btn-primary form-control']) !!}
							{!! Form::close() !!}
						</div>
                    </div>
                </div>
            </div>
        </div>
	
	</div>

</div>