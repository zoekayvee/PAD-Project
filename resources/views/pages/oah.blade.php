@extends('template')

@section('title')
    OAH
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
            <div class="col-sm-9">
                <h1 class="page-header">Tasks</h1>

                <div class="wrapper cards">
                    <h3>Promotions Committee</h3>

                    <div>
                        <p>list of all tasks</p>
                    </div>
                    <div class="form-group chart">
                        progress chart of the whole committee
                    </div>
                </div>
                <div class="wrapper cards">
                    <h3>Programs Committee</h3>

                    <div>
                        <p>list of all tasks</p>
                    </div>
                    <div class="form-group chart">
                        progress chart of the whole committee
                    </div>
                </div>
                <div class="wrapper cards">
                    <h3>Secretariat Committee</h3>

                    <div>
                        <p>list of all tasks</p>
                    </div>
                    <div class="form-group chart">
                        progress chart of the whole committee
                    </div>
                </div>
                <div class="wrapper cards">
                    <h3>Technicals Committee</h3>

                    <div>
                        <p>list of all tasks</p>
                    </div>
                    <div class="form-group chart">
                        progress chart of the whole committee
                    </div>
                </div>
                <div class="wrapper cards">
                    <h3>Visuals Committee</h3>

                    <div>
                        <p>list of all tasks</p>
                    </div>
                    <div class="form-group chart">
                        progress chart of the whole committee
                    </div>
                </div>
                <div class="wrapper cards">
                    <h3>Finance Committee</h3>

                    <div>
                        <p>list of all tasks</p>
                    </div>
                    <div class="form-group chart">
                        progress chart of the whole committee
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
@stop