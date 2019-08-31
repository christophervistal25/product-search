<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>@yield('title')</title>
</head>
<body>
	@yield('content')
	<script src="{{asset('/js/app.js')}}"></script>
	<script src="{{asset('/js/reader.js')}}"></script>
	@stack('scripts')
</body>
</html>
