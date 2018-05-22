<!doctype html>
<html lang="en">
<head>
	@include('layouts.head')
	@yield('css')
</head>
<body>
	@include('layouts.nav')
	@yield('home')
	<div class="container">
		@yield('content')
		@include('layouts.footer')
	</div>
	@stack('script')
	<script src="{{url('')}}/assets/js/vendor/popper.min.js"></script>
	<script src="{{url('')}}/dist/js/bootstrap.min.js"></script>
</body>
</html>
