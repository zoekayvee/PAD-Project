@extends('template')

@section('title')
    FAQ
@stop

@section('includes')
    <link rel="stylesheet" type="text/css"
      href="{{ asset('/css/faq.css') }}">
@stop

@section('navigation')
    @include('../includes/navigation')
@stop

@section('content')

<div class="container" id="home-wrapper">
    <div class="row">
        <div class="col-md-12 section">
            <h1 class="section-title">FAQ</h1>
            <h5 class="section-title">Frequently Asked Questions</h5>
        </div>
        <div class="col-md-6 section">
            <h5 class="section-title">1. What is the YSES Tracker?</h5>
            <p>The YSES Tracker is a website that will monitor progress and tasks and promote efficiency in preparation for any major event.</p>
            <br>
            <h5 class="section-title">2. What are its aims?</h5>
            <ul>
                <li>Coordination</li>
                <li>Promote Responsibility</li>
                <li>Achieve Higher Productivity</li>
                <li>Promote Better Planning</li>
            </ul>
            <br>
            <h5 class = "section-title">3. How do I make an account?</h5>
            <p> It's simple and easy! Just fill in the sign up form on the homepage and wait at least 24 hours for an admin's approval. </p>
        </div>
        <div class="col-md-6 section">
            <h5 class="section-title">4. I think I overestimated my progress, can I lower the percentage completed?</h5>
            <p>Feel free to adjust the progress bar on your own personal tasks. The YSES Tracker is made for your convenience.</p>
            <br>
            <h5 class="section-title">5. I've encountered bugs! Who do I contact?</h5>
            <p>You can contact any of the following YSERs:</p>
            <ul>
                <li>	Angelo Guiam: +639161085543 </li>
                <li>	Coubeili Cepe:+639356912182 </li>
                <li>	Magi Larin: +639169371936 </li>
                <li>	Zoe Villanueva: +639178606475 </li>
            </ul>
            <br>
            <h5 class="section-title">YSES Tracker would like to thank:</h5>
            <center><p> Almer T. Mendoza & Joseph Matthew Marcos </p></center>
          </div>
      </div>
  </div>

@stop
