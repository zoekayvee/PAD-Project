@extends('template')

@section('title')
    OAH
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
                        <h3>Secretariat Committee</h3>
                        <ul>
                            <li>Venue permit</li>
                            <li>Activity Permit</li>
                            <li>Letters to judges</li>
                            <li>Registration Form</li>
                        </ul>
                    </div>
                    <div>
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
@endsection
