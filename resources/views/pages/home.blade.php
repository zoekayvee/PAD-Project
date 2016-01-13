@extends('template')

@section('title')
  YSES Tracker :: Home
@stop

@section('includes')
  <link rel="stylesheet" type="text/css"
    href="{{ asset('/css/main.css') }}">
  <link rel="stylesheet" type="text/css"
    href="{{ asset('/css/mainpage.css') }}">
  <script type="text/javascript">
    $(document).ready(function(){

      $('#fin-overlay-panel').slideUp(0);

      $('#fin-update').click(function() {
        $('#fin-overlay-panel').slideDown('slow');
      });
      
    });
  </script>
@stop

@section('navigation')
    @include('../includes/navigation')
@endsection


@section('content')
<div id="fin-overlay-panel">
  <div class="card container">
    <div class="col-md-12" id='fin-form'>
    {!! Form::open(['url' => '/financial-status']) !!}
      <h4>Financial Status Report Update</h4>
      <hr>
      <p>Each group shall have four to five participants for this game. Members of the group will line-up horizontally. Each adjacent leg will be tied – legs that are not owned by the same person (see Figure 1). The total number of leg should be equal to the total number of members plus one (five members = 6 legs; four members = 5 legs).</p><br>
        <label name="cash_in">Weekly Cash In</label>
        <input type="number" name="cash_in" class="form-control"/><br>
        <label name="cash_out">Weekly Cash Out</label>
        <input type="number" name="cash_out" class="form-control"/><br>
        <label name="payables">Total Amout Payables</label>
        <input type="number" name="payables" class="form-control"/><br>

        {!! Form::submit("UPDATE", ["class"=>"btn btn-primary form-control"]) !!}
      {!! Form::close() !!}
    </div>   
  </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h1 class="page-header">Event Overview</h1>
            <center><h2>{{ $event->title }} : {{ $event->theme }}</h2>
            <h3>{{ $event->sem}}, {{ $event->year }}</h3>
            </center>

            <br>

            <!--Overall Progress Chart-->
            <div class="col-md-6 cards">
                <h4>Overall Progress</h4>
                <div>
<!--                  <div id="canvas-holder">
                      <canvas id="chart-area"/>
                  </div>
-->                </div>
            </div>

            <!--Overall Progress Chart-->
            <div class="col-md-6 cards">
                <h4>Committee Progress</h4>
                <div>
<!--                  <div id="canvas-holder">
                      <canvas id="chart-area"/>
                  </div>
-->                </div>
            </div>
<br><br>
            <div class="col-md-12">
              <h4>FINANCIAL STATUS
              <button class="btn btn-primary" id="fin-update" style="float:right">UPDATE</button>
              </h4>
              <br>
              <?php
                $fin_progress = $fin_status->cash_in_hand/$fin_status->target_budget;
                $fin_progress *= 100;
              ?>

              <div class="progress">
                  <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="{{ $fin_progress }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $fin_progress }}%"><span class="">{{ $fin_progress }}% of Target Budget</span></div>
              </div>

              <div class="col-md-4">                
                <h5>Cash in Hand: </h5>
                <h4>{{ $fin_status->cash_in_hand }}</h4>
              </div>

              <div class="col-md-4">                
                <h5>Payables: </h5>
                <h4>{{ $fin_status->payables }}</h4>
              </div>

              <div class="col-md-4">                
                <h5>Target Budget: </h5>
                <h4>{{ $fin_status->target_budget }}</h4>
              </div>


              <div class="col-md-12">
                <div class="col-md-4 fin-card">
                  <div>
                    <h5>Weekly Cash In</h5>
                    <h2>{{ $fin_status->cash_in }}</h2>
                  </div>
                </div>
                <div class="col-md-4 fin-card">
                  <div>
                    <h5>Weekly Cash Out</h5>
                    <h2>{{ $fin_status->cash_out }}</h2>
                  </div>
                </div>
                <div class="col-md-4 fin-card">
                  <div>
                    <h5>Weekly Income</h5>
                    <h2>{{ $fin_status->weekly_income }}</h2>
                  </div>
                </div>
              </div>
            </div>

        </div>


        <div class="col-md-4">

          <?php
            $is_head = false;
            if($heads->where("user_id", $user->id) != '[]') $is_head = true;
            elseif ($event->oah_id == $user->id) $is_head = true;
          ?>

          @if($is_head)
          <div class="col-md-12 card shout-form">
          {!! Form::open(['url' => '/announcement']) !!}
              <h3>Post Announcement</h3>
              <div class="form-group">
              <label name="title">Title</label>
              <input type="text" name="title" class="form-control"/>
              </div>
              <div class="form-group">
              <label name="shout">Body</label>
              <textarea type="text" name="shout" class="form-control"/></textarea>
              <input type="hidden" name="event_id" value="{{ $event->id}}">
              <input type="hidden" name="user_id" value="{{ $user->id}}">
              </div>
              {!! Form::submit("SHOUT", ["class"=>"btn btn-default"]) !!}
          {!! Form::close() !!}
          </div>
          @endif


          @foreach($shouts as $shout)
          <div class="col-md-12 card">
              <h4> {{ $shout->title }} </h4>
              <p> {{ $shout->shout }} </p>

              <?php
                $owner = "";
                $id = $shout->user_id;
                if($event->oah_id == $id) $owner = "Overall Activity Head";
                else {
                  $head = $heads->where('user_id', $id)->first();
                  $owner = $head->position;
                }
              ?>
              
              <h6>by {{ $owner }} <br>
               {{ $shout->created_at }} <br>

              </h6>
          </div>
          @endforeach

        </div>
</div>
@stop
