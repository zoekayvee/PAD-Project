<div class="row informations">
  <div class="col-lg-3 profile">
    <div>
      <img src="{{asset('images/back.jpg')}}" class="displayPic" alt="you">
    </div>
    <div class="info">
      {{ $user->username }}
    </div>
    <div class="info">
      {{ $user->lname }}, {{ $user->fname }} {{ $user->mname }} 
    </div>
    <div class="info">
      {{ $user->studno }}
    </div>
    <div class="info">
      {{ $user->department }}
      </div>
    <div class="info">
      {{ $user->batch }}                        
    </div>
  </div>

  <hr>

  <div class="table-responsive col-lg-9">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Event</th>
          <th>Semester</th>
          <th>Position</th>
          <th>Committee</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($head_committees as $committee)
          <tr>
          @foreach($events as $event)
            @if($event->id == $committee->event_id)
              <td><a href="#">{{$event->title}} : {{$event->theme}}</a></td>
              <td>{{$event->sem}}, {{$event->year}}</td>
            @endif
          @endforeach <!-- endforeach events  -->
          @foreach($heads_comm as $head)
            @if($head->comm_id == $committee->id)
              <td>{{ $head->position }}</td>
            @endif
          @endforeach <!-- endforeach heads_comm -->
          <td>{{ $committee->name }}</td>
        </tr>
        @endforeach <!-- endforeach head_committees -->


        @foreach ($mem_comm as $member)
          <tr>
            @foreach($all_comm as $committee)
                @if($committee->id == $member->comm_id)
                    @foreach($events as $event)
                        @if($event->id == $committee->event_id)
                            <td><a href="#">{{$event->title}} : {{$event->theme}}</a></td>
                            <td>{{$event->sem}}, {{$event->year}}</td>
                        @endif
                    @endforeach <!-- endforeach events  -->
                    <td> Member </td>
                    <td>{{ $committee->name }}</td>
                @endif  
            @endforeach <!-- endforeach all_comm -->
            </tr>
        @endforeach <!-- endforeach mem_comm -->
      </tbody>
    </table>
  </div>
</div>