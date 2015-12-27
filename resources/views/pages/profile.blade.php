@extends('template')

@section('title')
    Member
@endsection

@section('includes')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('/css/main.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('/css/profile.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <h1 class="page-header">Tasks</h1>
                <div class="col-md-4 cards">
                    <div>
                        <h3>Venue Permit</h3>
                        <p>Get form from the office, then pay for the venue fee with tech head.</p>
                    </div>
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

            <div class="col-lg-3">
                <div class="wrapper side">
                    <div>
                        <img src="images/back.jpg" class="displayPic" alt="you">
                    </div>
                    <div class="info">Name</div>
                    <div class="info">Birthday</div>
                    <div class="info">Department</div>
                    <div class="info">Batch</div>
                </div>

                <div class="wrapper side table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Event</th>
                          <th>Position</th>
                          <th>Comm</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><a href="#">Get 1/4 2015</a></td>
                          <td>Member</td>
                          <td>Sec</td>
                        </tr>
                        <tr>
                          <td><a href="#">PF/JF 2016</a></td>
                          <td>Member</td>
                          <td>Prom</td>
                        </tr>
                        <tr>
                          <td><a href="#">Get 1/4 2016</a></td>
                          <td>Member</td>
                          <td>VL</td>
                        </tr>
                      </tbody>
                    </table>
                </div>
            </div>
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
@endsection
