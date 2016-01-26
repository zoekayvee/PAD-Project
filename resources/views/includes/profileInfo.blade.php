@section('includes')
    <?php
      $names = array();
      $progress = array();
      foreach ($committees as $nama)
      {
        array_push($names, $nama->name);
        array_push($progress, $nama->progress);
      }

      $names = json_encode($names);
      $progress = json_encode($progress);
    ?>

    <link rel="stylesheet" type="text/css"
        href="{{ asset('/css/task_progress.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('/css/main.css') }}">
@stop

<div class="row informations">
  <div class="col-md-3 profile">
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

  <div class="col-md-9" id="home-left">
    <div class="table-responsive col-md-12">
      @if($curr_event->oah_id == $user->id)
        <h3 class="section-title">{{$curr_event->title}} : {{$curr_event->theme}}</h3>
        <div id="canvas-holder">
          <canvas id="chart-area"/>
        </div> 

      @else
        <h1>{{$curr_event->title}} : {{$curr_event->theme}}</h1>
        <div>
        @foreach($heads_comm as $head)
          <tr>
          @foreach ($committees as $committee)
            @if($head->comm_id == $committee->id)
              @foreach($events as $event)
                @if($event->id == $committee->event_id)
                  <h3 class="section-title">{{$committee->name}} Progress</h3>
                  <?php
                    $curr_comm = $committee->progress;
                  ?>
                  <div class="progress">
                      <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="{{ $curr_comm }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $curr_comm }}%"><span class="">{{ $curr_comm }}%</span></div>
                  </div>
                @endif
              @endforeach <!-- endforeach events  -->
            @endif
          @endforeach <!-- endforeach all_comm -->
          </tr>
        @endforeach <!-- endforeach heads_comm -->

        @foreach ($mem_comm as $member)
          <tr>
            @foreach($committees as $committee)
                @if($committee->id == $member->comm_id)
                    @foreach($events as $event)
                        @if($event->id == $committee->event_id)
                          <h3>{{$committee->name}} Progress</h3>
                          <?php
                            $curr_comm = $committee->progress;
                          ?>
                          <div class="progress">
                              <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="{{ $curr_comm }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $curr_comm }}%"><span class="">{{ $curr_comm }}%</span></div>
                          </div>
                        @endif
                    @endforeach <!-- endforeach events  -->
                @endif  
            @endforeach <!-- endforeach all_comm -->
            </tr>
        @endforeach <!-- endforeach mem_comm -->
        </div>
      @endif

      
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
              <?php
                  $event_id = $event->id;
              ?>
              <td><a href="profile/{{$event_id}}">{{$event->title}} : {{$event->theme}}</a></td>
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
                    <?php
                        $event_id = $event->id;
                    ?>
                    <td><a href="profile/{{$event_id}}">{{$event->title}} : {{$event->theme}}</a></td>
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
                              <?php
                                  $event_id = $event->id;
                              ?>
                              <td><a href="/profile/{{$event_id}}">{{$event->title}} : {{$event->theme}}</a></td>
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
</div>

<script type="text/javascript">
 
  var randomScalingFactor = function(){ return Math.round(Math.random()*100)};

  var barChartData = {
    labels :  {!! $names !!},
    datasets : [
      {
        fillColor : "rgba(151,187,205,0.5)",
        strokeColor : "rgba(151,187,205,0.8)",
        highlightFill : "rgba(151,187,205,0.75)",
        highlightStroke : "rgba(151,187,205,1)",
        data : {!! $progress !!}
      }
    ]

  }
  window.onload = function(){
    var ctx = document.getElementById("chart-area").getContext("2d");
    window.myBar = new Chart(ctx).Bar(barChartData, {
      responsive : true
    });
  }
</script> 