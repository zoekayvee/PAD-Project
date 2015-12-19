<!doctype html>
<html>
<head>
	<title>
		@yield('title')
	</title>

  <link rel="stylesheet" type="text/css"
    href="{{ asset('/css/bootstrap.css') }}">
  <script type="text/javascript"
    src="{{ asset('js/bootstrap.js')}}"></script>

   	@yield('includes')

</head>
<body>

	<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">YSES Tracker</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">*Name*</a></li>
            <li><a href="#">Logout</a></li>
            <li><a href="#">Help</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>

    <div class="container">
    	<br>
    	<br>
    	<br>
		Standard yung header navigation bar natin. Without repeating the code
		for the nav bar, kaya na natin syang ulit ulitin in every single page
		by just using the same block of code. Anything below this paragraph ay
		dynamic na niloload ng page by using one whole template. Imagine this page
		na isang template na may header at content. Every page, ang binabago lang
		natin ay yung "content" na part without actually changing what is in the nav bar.
	</div>

		@yield('content')

	<div>

    <div class="container">
    	<br>
    	and just like the nav bar, we also have a template for footer. 
	</div>
		
	</div>
</body>
</html>