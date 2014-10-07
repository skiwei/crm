<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
	<title>CRM</title>
	@include('layouts.partials.css')
	@yield('css')
</head>
<body>
	<div class='container'>
		@include('flash::message')

		@yield('content')
	</div>
	@include('layouts.partials.js')
	@yield('js')
</body>
</html>
