<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Kirwa Takadi</title>
	{{-- <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css"> --}}
	{{-- <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"> --}}
	<link rel="stylesheet" href="{{ mix('/css/app.css') }}">
	<link rel="stylesheet" href="{{ mix('/css/theme.css') }}">
	<link rel="icon" href=" {{ asset('images/posts_icon.png') }} ">
</head>
<body>
	@if (session()->has('status'))
		<h4 style="color: green;">{{ session()->get('status') }}</h4>
	@endif

<nav class="navbar navbar-expand navbar-dark bg-primary">
	<ul class="nav navbar-nav">
		<li class="nav-item"><a style="color: white;" class="nav-link" href="{{ route('welcome') }}">Home</a></li>
		<li class="nav-item"><a style="color: white;" class="nav-link" href="{{ route('about') }}">About</a></li>
		<li class="nav-item"><a style="color: white;" class="nav-link" href="{{ route('posts.create') }}">Create Post</a></li>
	</ul>
</nav>

<div class="container">
@yield('content')

<script src="{{ mix('/js/app.js') }}"></script>
</div>
</body>
</html>

