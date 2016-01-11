@extends('template')

@section('title')
  YSES Tracker :: Home
@stop

@section('includes')
  <link rel="stylesheet" type="text/css"
    href="{{ asset('/css/main.css') }}">
  <link rel="stylesheet" type="text/css"
    href="{{ asset('/css/mainpage.css') }}">
@stop

@section('navigation')
    @include('../includes/navigation')
@endsection


@section('content')

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
                  <div id="canvas-holder">
                      <canvas id="chart-area"/>
                  </div>
                </div>
            </div>

            <!--Overall Progress Chart-->
            <div class="col-md-6 cards">
                <h4>Committee Progress</h4>
                <div>
                  <div id="canvas-holder">
                      <canvas id="chart-area"/>
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
          {!! Form::open(['url' => '/']) !!}
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
