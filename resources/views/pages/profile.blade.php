@extends('template')

@section('title')
    Member
@stop

@section('includes')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('/css/main.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('/css/profile.css') }}">
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <h1 class="page-header">Tasks</h1>
                <div class="col-md-4 cards">
                    <div>
                        <h3>Venue Permit</h3>
                        <h5>Due: January 35, 2098</h5>
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
