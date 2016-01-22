<!doctype html>
<html>
<head>

	<title>
		@yield('title')
	</title>

	@include('includes/head')
    <link rel="stylesheet" type="text/css"
          href="{{ asset('/css/main.css') }}">

   	@yield('includes')

</head>
<body>

	<div id="app-container">
		
		@yield('navigation')
		@yield('content')

	</div>

    <div class="container">
    	YSES Tracker.2015 
	</div>

</body>
</html>