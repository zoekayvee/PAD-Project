@extends('template')

@section('title')
    Lower Heads
@stop

@section('includes')
    <link rel="stylesheet" type="text/css"
          href="{{ asset('/css/oah.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('/css/profile.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('/css/main.css') }}">
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="container dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">View<span class="caret"></span></a>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><h3>View<span class="caret"></span></h3></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">All Committee tasks</a></li> <!-- gjh -->
                        <li><a href="#">Personal Tasks</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">Delegate Task</li>
                        <li><a href="#">Member 1</a></li>
                        <li><a href="#">Member 2</a></li>
                        <li><a href="#">Member 3</a></li>
                    </ul>
                    <!--/.nav-collapse -->

                    <!-- insert navigation panels here for the ffg
                            task delegation
                            task by committee
                     -->
                </div>
                <div class="wrapper cards">
                    <h3>Task 1</h3>

                
                <div class="col-md-4 cards">
                    <div>
                        <h3>Venue Permit</h3>
                        <h5>Due: January 35, 2098</h5>
                        <p>Get form from the office, then pay for the venue fee with tech head.</p>
                    </div>
                    <div class="wrapper">
                        <div class="form-group">
                            <label class="">Percentage done</label>
                            <input class="form-control" placeholder="%">
                        </div>
                        <div class="form-group chart">
                            chart
                        </div>
                    </div>
                </div>

                <div class="wrapper cards">
                    <h3>Task 2</h3>

                    <div>
                        <div class="form-group">
                            <label class="">Percentage done</label>
                            <input class="form-control" placeholder="%">
                            <button class="btn btn-primary" href="#">Done</button>
                        </div>

                        <div id="canvas-holder">
                            <canvas id="chart-area"/>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-3 sidebar">
                <div class="container-fluid side">
                    <img src="images/back.jpg" class="displayPic" alt="you"><br>
                    Name<br>
                    Birthday<br>
                    Department<br>
                    Batch<br>
                </div>

                <div class="container-fluid side">
                    <h3>Tracker</h3>

                    <p>Details</p>
                </div>
            </div>

        </div>
    </div>
            @include('../includes/profileInfo')
        </div>
    </div>

    <script>
        var pieData = [
                {
                    value: 96,
                    color:"#F7464A",
                    highlight: "#FF5A5E",
                    label: "Completed"
                },
                {
                    value: 4,
                    color: "#46BFBD",
                    highlight: "#5AD3D1",
                    label: "On the process"
                }
            ];

        window.onload = function(){
            var ctx = document.getElementById("chart-area").getContext("2d");
            window.myPie = new Chart(ctx).Pie(pieData);
        };
            
    </script>
@stop
