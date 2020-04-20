@extends('layout')

@section('content')

<h2>{{ $post->postname }}</h2>
<p>{{ $post->description }}</p>
<p>{{ $post->created_at->diffForHumans() }}</p>
<h4>
	status:
	@if ($post->status == 'active')
		Running
	@elseif ($post->status == 'no active')
		Not Running
	@else
		Unkown Status
	@endif
</h4>

<h1 class="badge badge-warning"> Comments: </h1>

@foreach ($comments as $comment)
	<p class="text-muted">{{ $comment->content }}</p>
	<p class="badge badge-success">Added : {{ $comment->updated_at->diffForHumans() }}</p>
@endforeach

@endsection
