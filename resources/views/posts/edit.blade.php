@extends('layout')

@section('content')
<h1>Edit Post</h1>
<form method="POST" action="{{ route('posts.update', ['post' => $post->id]) }}" enctype="multipart/form-data">
	@csrf
	@method('PUT')
	@include('form')
	<button class="btn btn-block btn-warning" type="submit">Push and Edit</button>
</form>

@endsection
