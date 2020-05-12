@extends('layout')

@section('content')
<div class="row">
	<div class="col-8">
		<h2>{{ $post->postname }}</h2>
		{{-- <x-tags :tags="$post->tags()->get()"></x-tags> --}}
		<x-tags :tags="$post->tags"></x-tags>
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

		@foreach ($post->comments as $comment)
			<p class="text-muted">{{ $comment->content }}</p>
			<p class="badge badge-success">Added : {{ $comment->updated_at->diffForHumans() }}, By {{ $comment->user->name }}</p>
		@endforeach
	</div>
	<div class="col-4">

		@include('posts.sidebar')

	</div>
</div>
@endsection
