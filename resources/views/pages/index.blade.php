<!-- use page template, see \resources\views\template.blade.php -->
@extends('template')

        <!-- replaces @yield('title') on the template html, see \resources\views\template.blade.php -->
@section('title')
    Home
    @stop

    @section('includes')
            <!-- replaces @yield('includes') on the template html, see \resources\views\template.blade.php -->
    <link rel="stylesheet" type="text/css"
          href="{{ asset('/css/main.css') }}">
    <style type="text/css">
        .button {
            background-color: white;
            box-shadow: 1px 1px 5px #dcdcdc;
            padding: 20px;
            text-align: center;     
            color: black;
            border-radius: 5px;       
        }
        .button:hover {
            box-shadow: 1px 1px 5px #989898;
            transform: scale(1.1);            
        }
    </style>
    @stop

@section('navigation')
    @include('../includes/navigation-false')
@endsection

@section('content')
    <div class="container">
        <H1>Dummy Home Page</H1>
        <br>
        <div class="col-md-12">
            <a href="/account/login">     
                <div class="col-md-3">           
                <div class="button">LOGIN</div>
                </div>
            </a>
            <a href="/account/register">
                <div class="col-md-3">           
                <div class="button">REGISTER</div>
                </div>
            </a>
            <a href="/profile"> 
                <div class="col-md-3">           
                <div class="button">SHOW PROFILE</div>
                </div>
            </a>
            <a href="/profile/show">
                <div class="col-md-3">           
                <div class="button">SHOW REGISTERED USERS</div>
                </div>
            </a>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>

    </div>

@stop