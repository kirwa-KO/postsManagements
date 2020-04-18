@extends('layout')

@section('content')
<h1>Lists of Posts</h1>

<ul class="list-group">
@forelse ($posts as $post)
	<li class="list-group-item">
		<h2><a href=" {{ route('posts.show', [ 'post' => $post->id ]) }} ">{{ $post->postname }}</a></h2>
		<p>{{ $post->description }}</p>
		<p>{{ $post->created_at->diffForHumans() }}</p>
		<h4>status: {{ $post->status }}</h4>
		<a class="btn btn-warning" href="{{ route('posts.edit', [$post->id]) }}">Edit</a>
		<form style="display: inline" method="POST" action="{{ route('posts.destroy', ['post' => $post->id]) }}">
			@csrf
			@method('DELETE')
			<button class="btn btn-danger" type="submit">Remove</button>
		</form>
	</li>
@empty
	<span class="badge badge-danger">No Post for now...!</span>
@endforelse
</ul>
@endsection
