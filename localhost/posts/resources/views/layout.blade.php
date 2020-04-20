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
	<link rel="stylesheet" href="{{ asset('/css/custome.css') }}">
	<link rel="icon" href=" {{ asset('images/posts_icon.png') }} ">
</head>
<body>
	@if (session()->has('status'))
		<h4 style="color: red; background-color: black;">{{ session()->get('status') }}</h4>
	@endif

<nav class="navbar navbar-expand navbar-dark bg-primary">
	<ul class="nav navbar-nav">
		<li class="nav-item"><a style="color: white;" class="nav-link" href="{{ route('welcome') }}">Home</a></li>
		<li class="nav-item"><a style="color: white;" class="nav-link" href="{{ route('about') }}">About</a></li>
		<li class="nav-item"><a style="color: white;" class="nav-link" href="{{ route('posts.create') }}">Create Post</a></li>

		<li class="nav-item dropdown" style="margin-left: 900px;">
			<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
				{{ Auth::user()->name }} <span class="caret"></span>
			</a>

			<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
				<a class="dropdown-item" href="{{ route('logout') }}"
				   onclick="event.preventDefault();
								 document.getElementById('logout-form').submit();">
					{{ __('Logout') }}
				</a>

				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					@csrf
				</form>
			</div>
		</li>

	</ul>
</nav>

<div class="container">
@yield('content')

<script src="{{ mix('/js/app.js') }}"></script>
</div>
</body>
</html>

