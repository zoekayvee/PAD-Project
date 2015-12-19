@extends('template')

@section('title')
    Member
@endsection

@section('includes')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('/css/profile.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
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
                    <div class="form-group chart">
                        chart
                    </div>
                </div>
                </div>

                <div class="wrapper cards">
                    <h3>Task 2</h3>
                    <div>
                        <p>Details, for what, etc</p>
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
@endsection