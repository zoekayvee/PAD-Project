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

	@yield('navigation')
	@yield('content')

    <div class="container">
    	YSES Tracker.2015 
	</div>

</body>
</html>