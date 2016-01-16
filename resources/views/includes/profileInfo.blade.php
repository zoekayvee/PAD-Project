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
    <h3>Committee Progress</h3>
        <!-- Committee progress Pag heads pababa, else Event progress pag OAh -->
    <div class="progress">
        <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%"><span class="">100% Complete</span></div>
    </div>
    <br>
    <table class="table table-condensed table-hover table-border">
      <thead>
        <tr>
          <th>Event</th>
          <th>Semester</th>
          <th>Position</th>
          <th>Committee</th>
        </tr>
      </thead>
      <tbody>

        <!-- As oah of event  -->
        @foreach($events as $event)
          <tr>
          @if($event->oah_id == $user->id)
            <td><a href="#">{{$event->title}} : {{$event->theme}}</a></td>
            <td>{{$event->sem}}, {{$event->year}}</td>
            <td>OAH</td>
          @endif
          </tr>
        @endforeach <!-- endforeach events -->

        <!-- As head of committee  -->
        @foreach($heads_comm as $head)
          <tr>
          @foreach ($all_comm as $committee)
            @if($head->comm_id == $committee->id)
              @foreach($events as $event)
                @if($event->id == $committee->event_id)
                  <td><a href="#">{{$event->title}} : {{$event->theme}}</a></td>
                  <td>{{$event->sem}}, {{$event->year}}</td>
                  <td>{{ $head->position }}</td>
                  <td>{{ $committee->name }}</td>
                @endif
              @endforeach <!-- endforeach events  -->
            @endif
          @endforeach <!-- endforeach all_comm -->
          </tr>
        @endforeach <!-- endforeach heads_comm -->


        <!-- As member of committee  -->
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