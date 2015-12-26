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
    @stop

            <!-- replaces @yield('content') on the template html, see \resources\views\template.blade.php -->
@section('content')
    <div class="container">
        <H1>Dummy Home Page</H1>
        <h3>Test the registration and log in:</h3>
        <p>STEP 1: Go to your console.</p>
        <p>STEP 2: Traverse to our project directory.</p>
        <p>STEP 3: php artisan migrate</p>
        <p>STEP 4: Type the step 3 on your console. If Successfull you should be able to test our registration smoothly.</p>
        <p>STEP 5: Check it here:</p>
        <a href="/account/show">
            <button class="btn btn-warning">Show All Accounts</button>    
        </a><br><br>
        <h3>Test that you are already logged in:</h3>
        <p>Look at the profile info (right-side panel)</p>
        <a href="/profile">
            <button class="btn btn-warning">Show Profile</button>    
        </a><br><br>

    </div>

@stop