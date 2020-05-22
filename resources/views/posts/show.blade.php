@extends('layout')

@section('content')
<div class="row">
	<div class="col-8">
		<h2>{{ $post->postname }}</h2>
		{{-- <x-tags :tags="$post->tags()->get()"></x-tags> --}}
		{{-- import post image --}}
		@if ($post->image)
		{{-- <img src="{{ Storage::url($post->image->path ?? null) }}" alt="post image" class="img-fluid rounded"> --}}
			<img src="{{ $post->image->url() }}" alt="post image" class="img-fluid rounded">
			{{-- {{ dd($post->image->path, $post->id) }} --}}
		@endif
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

		{{-- @include('comments.form', ['id' => $post->id]) --}}

		<x-comment-form :action="route('posts.comment.store', ['post' => $post->id])"></x-comment-form>

		{{-- <h1 class="badge badge-warning"> Comments: </h1>

		@foreach ($post->comments as $comment)
			<p class="text-muted">{{ $comment->content }}</p>
			<p class="badge badge-success">Added : {{ $comment->updated_at->diffForHumans() }}, By {{ $comment->user->name }}</p>
		@endforeach --}}

		<x-comment-list :comments="$post->comments"></x-comment-list>

	</div>
	<div class="col-4">

		@include('posts.sidebar')

	</div>
</div>
@endsection
