@extends('template')

@section('title')
    Home
@stop

@section('includes')

  <?php
    $fin_progress = $fin_status->cash_in_hand/$fin_status->target_budget;
    $fin_progress *= 100;

    $raw_money = round($fin_progress);

    if($fin_progress > 100) $fin_progress = 100;

    $names = array();
    $progress = array();
    foreach ($comm_name as $nama)
    {
      array_push($names, $nama->name);
      array_push($progress, $nama->progress);
    }

    $names = json_encode($names);
    $progress = json_encode($progress);
  ?>
  
  <link rel="stylesheet" type="text/css"
    href="{{ asset('/css/home.css') }}">
  <script type="text/javascript"
    src="{{ asset('/js/home.js') }}">
    </script>

@stop

@section('navigation')
    @include('../includes/navigation')
@endsection


@section('content')
<!-- <div class="col-md-12" id="fin-overlay-panel">
  <div class="card container">
    <div class="col-md-12" id='fin-form'>
    {!! Form::open(['url' => '/financial-status']) !!}
      <h4 class="section-title">Financial Status Report Update</h4>
      <hr>
      <p>Each group shall have four to five participants for this game.
      Members of the group will line-up horizontally.
      Each adjacent leg will be tied – legs that are not owned by the same person (see Figure 1).
      </p><br>
        <label name="cash_in">Weekly Cash In</label>
        <input type="number" name="cash_in" class="form-control" required/><br>
        <label name="cash_out">Weekly Cash Out</label>
        <input type="number" name="cash_out" class="form-control" required/><br>
        <label name="payables">Total Amout Payables</label>
        <input type="number" name="payables" class="form-control" required/><br>

        {!! Form::submit("UPDATE", ["class"=>"btn btn-primary form-control"]) !!}
      {!! Form::close() !!}
      <button class="btn btn-default form-control" id="close-fin-form">CLOSE</button>
    </div>   
  </div>
</div> -->

<div class="container" id="home-wrapper">
    <div class="row">

    <div class="col-md-8" id="home-left">
        <div class="col-md-12 section" id="section-header-hover">
            <center>
                <br>
                <h1 class="section-title">{{ $event->title }} : {{ $event->theme }}</h1>
                <p>{{ $event->sem }}, {{ $event->year }}</p>
            </center>
        </div>        

        <div class="col-md-12 section" id="section-header"> 
        </div>
        
            <!--Overall Progress Chart-->
            <div class="col-md-12 section">
                <h4 class="section-title">Overall Progress</h4>
                
                <div id="canvas-holder">
                  <canvas id="chart-area"/>
                </div> 
            </div>
            

        <div class="col-md-12 section" id="fin-panel">
            <h4 class="section-title" id="fin-status-title"> FINANCIAL STATUS
                <?php
                    $is_fin_head = false;
                    $head = $heads->where('user_id', $user->id)->where('position', 'Finance Committee Head')->first();
                    if( $head != "") $is_fin_head = true;
                ?>
                @if( $is_fin_head)
                    <a href="/balance">
                        <button class="btn btn-primary" style="width:auto; float:right; margin-left:10px;" style="float:right">View Recievables</button>
                    </a>
                    <button class="btn btn-primary" style="width:auto; float:right" data-toggle="modal" data-target="#myModal" style="float:right">UPDATE</button>
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Update Financial Status</h4>
                                </div>
                                <div class="modal-body">
                                    {!! Form::open(['url' => '/financial-status']) !!}
                                    <label name="cash_in">Weekly Cash In</label>
                                    <input type="number" name="cash_in" class="form-control" required/><br>
                                    <label name="cash_out">Weekly Cash Out</label>
                                    <input type="number" name="cash_out" class="form-control" required/>        <br>
                                    <label name="payables">Total Amout Payables</label>
                                    <input type="number" name="payables" class="form-control" required/>
                                    <br>

                                    {!! Form::submit("UPDATE", ["class"=>"btn btn-primary form-control"]) !!}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </h4>
            <br>

            <div class="col-md-12" id="fin-total">
                <div class="progress">
                    <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="{{ $fin_progress }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $fin_progress }}%"><span class="fin-progress-value">{{ $raw_money }}% of Target Budget</span></div>
                </div>
                <div class="col-md-4">                
                    <h5>Cash at Hand: </h5>
                    <h4>&#x20B1;{{ $fin_status->cash_in_hand }}</h4>
                </div>
                <div class="col-md-4">                
                    <h5>Payables: </h5>
                    <h4>&#x20B1;{{ $fin_status->payables }}</h4>
                </div>
                <div class="col-md-4">                
                    <h5>Target Budget: </h5>
                    <h4>&#x20B1;{{ $fin_status->target_budget }}</h4>
                </div>
            </div>

            <div class="col-md-12">
                <hr>
                <div class="col-md-4 fin-card">
                    <div>
                        <div class="col-md-12 cash_icon">
                            <img src="{{ asset('images/cash_in.png') }}">
                        </div>
                        <div class="fin-ribbon">                            
                            <h2 class="value section-title">&#x20B1;{{ $fin_status->cash_in }}</h2>
                        </div>
                        <h5>Weekly Cash In</h5>
                    </div>
                </div>
                <div class="col-md-4 fin-card">
                    <div>
                        <div class="col-md-12 cash_icon">
                            <img src="{{ asset('images/cash_out.png') }}">
                        </div>
                        <div class="fin-ribbon">                            
                            <h2 class="value section-title">&#x20B1;{{ $fin_status->cash_out }}</h2>
                        </div>
                        <h5>Weekly Cash Out</h5>
                    </div>
                </div>
                <div class="col-md-4 fin-card">
                    <div>
                        <div class="col-md-12 cash_icon">
                            <img src="{{ asset('images/cash_inc.png') }}">
                        </div>
                        <div class="fin-ribbon">                            
                            <h2 class="value section-title">&#x20B1;{{ $fin_status->weekly_income }}</h2>
                        </div>
                        <h5>Weekly Income</h5>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="col-md-4" id="home-right">

        <div class="col-md-12 section right-pannel" id="tasks-panel-wrapper">
            <h4 class="section-title">Task Reminders</h4>
            <div class="col-md-12" id="task-panel">
                
            @if(count($tasks) == 0)          
                <div>No pending tasks.</div>
            @endif

            @if(count($tasks) > 0)          
            @foreach($tasks as $task)
                <div class="col-md-12 rem-list">                   
                    <div class="col-md-7 rem-title">{{ $task->title }}</div>
                    <div class="col-md-5 rem-deadline">{{ $task->deadline }}</div>
                </div>
            @endforeach
            @endif
            </div>
        </div>

        
        <?php
            $is_head = false;
            if($heads->where("user_id", $user->id) != '[]') $is_head = true;
            elseif ($event->oah_id == $user->id) $is_head = true;
        ?>
        @if($is_head)
        <div class="col-md-12 section shout-form right-pannel">
        {!! Form::open(['url' => '/announcement']) !!}
            <h4 class="section-title">Post Announcement</h4>
            
            <div class="form-group">
                <textarea type="text" name="shout" class="form-control"/></textarea>
                <input type="hidden" name="event_id" value="{{ $event->id}}">
                <input type="hidden" name="user_id" value="{{ $user->id}}">
            </div>
            {!! Form::submit("POST", ["class"=>"btn btn-primary"]) !!}
          {!! Form::close() !!}
        </div>
        @endif

        <div class="col-md-12 section right-pannel">
            <h4 class="section-title">Announcements</h4>
            <div class="carousel slide" data-ride="carousel" id="carousel-example">
                <div class="row">
                    <div class="col-md-12">
                        <div class="carousel-inner">

                            <div class="item active">
                                <div class="carousel-content">
                                    <div>
                                    <p class="shout-body">MALIGAYANG PAGDATING SA YSES TRACKER! Event Natin Ito. Go Ysers! We can do it.<br><br>Next Committee Meeting will be on January 60, 1923.</p>
                                    <h6 class="shout-owner">by Overall Activity Head<br>
                                    </div>
                                </div>
                            </div>
                
                            @foreach($shouts as $shout)
                            <div class="item">
                                <div class="carousel-content">
                                    <div>
                                    <p class="shout-body"> {{ $shout->shout }} </p>

                                    <?php
                                        $owner = "";
                                        $id = $shout->user_id;
                                        if($event->oah_id == $id) $owner = "Overall Activity Head";
                                        else {
                                          $head = $heads->where('user_id', $id)->first();
                                          $owner = $head->position;
                                        }
                                    ?>

                                        <h6 class="shout-owner">by {{ $owner }}<br>
                                        {{ $shout->created_at }}<br>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <a class="left carousel-control" href="#carousel-example" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>

        </div>


        </div>

    </div>

    </div>
</div>
@stop

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