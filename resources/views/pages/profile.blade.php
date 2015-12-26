@extends('template')

@section('title')
    Member
@stop

@section('includes')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('/css/profile.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('/css/main.css') }}">
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <h1 class="page-header">Tasks</h1>
                <div class="wrapper cards">
                    <h3>Task 1</h3>
                    <div>
                        <p>Details, for what, etc</p>
                    </div>
                    <div class="wrapper">
                        <div class="form-group">
                            <label class="">Percentage done</label>
                            <input class="form-control" placeholder="%">
                        </div>

                        <div id="canvas-holder">
                            <canvas id="chart-area" width="150" height="150"/>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="wrapper side">
                    <div>
                        <img src="images/back.jpg" class="displayPic" alt="you">
                    </div>
                    <div class="info">
                        {{ $user['username'] }}
                    </div>
                    <div class="info">
                        {{ $user['lname'] }}, {{ $user['mname'] }} {{ $user['fname'] }}
                    </div>
                    <div class="info">
                        {{ $user['studno']}}
                    </div>
                    <div class="info">
                        {{ $user['department']}}
                    </div>
                    <div class="info">
                        {{ $user['batch']}}                        
                    </div>
                </div>

                <div class="wrapper side table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Event</th>
                          <th>Position</th>
                          <th>Department</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Get 1/4 2015</td>
                          <td>Member</td>
                          <td>Secretariat</td>
                        </tr>
                        <tr>
                          <td>PF/JF 2016</td>
                          <td>Member</td>
                          <td>Promotions</td>
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
@stop
