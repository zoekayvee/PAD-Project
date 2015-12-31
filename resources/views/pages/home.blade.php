@extends('template')

@section('title')
  YSES Tracker :: Home
@endsection

@section('includes')
  <link rel="stylesheet" type="text/css"
    href="{{ asset('/css/main.css') }}">
  <link rel="stylesheet" type="text/css"
    href="{{ asset('/css/mainpage.css') }}">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <h1 class="page-header">Event Overview</h1>
            <center><h2>GET 1/4 (2015-2016)</h2></center>

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



        <div class="col-lg-4">
          <div class="oah">
              <div>
                <h4>Message from OAH</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
              </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="head">
              <div>
                <h4>Message from Committee Head</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
              </div>
          </div>
        </div>

    </div>
</div>

<script>
    var pieData = [
            {
                value: 60,
                color:"#F7464A",
                highlight: "#FF5A5E",
                label: "Completed"
            },
            {
                value: 40,
                color: "#46BFBD",
                highlight: "#5AD3D1",
                label: "In the process"
            }
        ];

    window.onload = function(){
        var ctx = document.getElementById("chart-area").getContext("2d");
        window.myPie = new Chart(ctx).Pie(pieData);
    };

</script>

@endsection
