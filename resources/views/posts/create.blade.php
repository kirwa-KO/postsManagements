@extends('layout')

@section('content')
<h1>Create Post</h1>
<form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
	@csrf
	@include('form')
	<button class="btn btn-block btn-primary" type="submit">Push it</button>
</form>

@endsection
