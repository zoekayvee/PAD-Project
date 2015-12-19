<!doctype html>
<html>
<head>
	
	<!-- dyamically yield the title of the page -->
	<title>
		@yield('title')
	</title>

	<!-- includes external css and javascript, see includes/head.blade.php -->
	@include('includes/head')

	<!-- dyamically yield page-specific css and js of each page -->
   	@yield('includes')

</head>
<body>

	<!-- includes navigation bar of the page, see includes/navigation.blade.php -->
	@include('includes/navigation')

    <div class="container">
		Standard yung header navigation bar natin. Without repeating the code
		for the nav bar, kaya na natin syang ulit ulitin in every single page
		by just using the same block of code. Anything below this paragraph ay
		dynamic na niloload ng page by using one whole template. Imagine this page
		na isang template na may header at content. Every page, ang binabago lang
		natin ay yung "content" na part without actually changing what is in the nav bar.
	</div>

	<!-- dyamically yield the content of the page -->
	@yield('content')

    <div class="container">
    	and just like the nav bar, we also have a template for footer. 
	</div>
		
</body>
</html>