@extends('layout')

@section('content')
<h1>Lists of Posts</h1>

<nav class="nav nav-tabs nav-stacked my-5">
	<a class="nav-link @if ($tab == 'list') active @endif" href="/posts">Active</a>
	<a class="nav-link @if ($tab == 'archive') active @endif" href="/posts/archive">Archive</a>
	<a class="nav-link @if ($tab == 'all') active @endif" href="/posts/all">All</a>
</nav>

<div>
	<h4>{{ $posts->count() }} Post(s)</h4>
</div>

<ul class="list-group">
@forelse ($posts as $post)
	<li class="list-group-item">
		<h2><a href=" {{ route('posts.show', [ 'post' => $post->id ]) }} ">{{ $post->postname }}</a></h2>
		<p>{{ $post->description }}</p>
		<p>{{ $post->created_at->diffForHumans() }}</p>
		<h4>status: {{ $post->status }}</h4>

		<p class="text-muted">
			{{ $post->updated_at->diffForHumans() }}, By {{ $post->user->name }}
		</p>

		@if ($post->comments_count > 0)
		<div>
			<span class="badge badge-success">{{ $post->comments_count }} comments</span>
		</div>
		@else
		<div>
			<span class="badge badge-dark">No comments yet..!</span>
		</div>
		@endif

		@can('update', $post)
		<a class="btn btn-warning" href="{{ route('posts.edit', [$post->id]) }}">Edit</a>
		@endcan

		@if (!$post->deleted_at)
			@can('delete', $post)
			<form class="formInline" method="POST" action="{{ route('posts.destroy', ['post' => $post->id]) }}">
				@csrf
				@method('DELETE')
				<button class="btn btn-danger" type="submit">Remove</button>
			</form>
			@endcan
			@cannot('delete', $post)
				<p class="badge badge-danger">
					you can't edit this post..!
				</p>
			@endcannot
		@else
			@can('restore', $post)
			<form class="formInline" method="POST" action="{{ url('/posts/' . $post->id . '/restore') }}">
				@csrf
				@method('PATCH')
				<button class="btn btn-success" type="submit">Restore</button>
			</form>
			@endcan
			@can('forceDelete', $post)
			<form class="formInline" method="POST" action="{{ url('/posts/' . $post->id . '/forcedelete') }}">
				@csrf
				@method('DELETE')
				<button class="btn btn-danger" type="submit">Force Delete</button>
			</form>
			@endcan
		@endif
	</li>
@empty
	<span class="badge badge-danger">No Post for now...!</span>
@endforelse
</ul>
@endsection
