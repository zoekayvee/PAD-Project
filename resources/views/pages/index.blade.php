@extends('template')

@section('title')
Home
@endsection

@section('content')
<div class="container">
	<h1>HI GUYS.</h1>
	<h2>Look at the adress bar. Is it http://localhost:8000/?
	<br>Now check <b>http://localhost:8000/profile</b>
	then read the paragraphs above and below

	<h1>FOR FRONT END:</h1>
	<h2>please check "public" folder sa project directory natin. Dun nakalagay lahat ng resources like images, css, javascript
	<br>Furthermore, please check <b>resources/views/pages</b>
	explore <b>index.blade.php</b> (code ng page na ito) at <b>profile.blade.php</b> (code ng profile page, (c) Beili)
	**** Yung <b>template.blade.php</b> sa <b>resources/views</b> yung pinaka mother page nila. check the format.
	</h2>
	<br>
	</h2>
</div>
@endsection