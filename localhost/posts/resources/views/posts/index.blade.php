@extends('layout')

@section('content')

<div class="row">
	<h1 class="col-12">Lists of Posts</h1>
	<nav class="nav nav-tabs nav-stacked my-5 col-12">
		<a class="nav-link @if ($tab == 'list') active @endif" href="/posts">Active</a>
		<a class="nav-link @if ($tab == 'archive') active @endif" href="/posts/archive">Archive</a>
		<a class="nav-link @if ($tab == 'all') active @endif" href="/posts/all">All</a>
	</nav>
	<div class="col-12">
		<h4>{{ $posts->count() }} Post(s)</h4>
	</div>
	<div class="col-8">


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
	</div>
	<div class="col-4">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Most Commented Posts:</h4>
			</div>
			<ul class="list-group list-group-flush">
				@foreach ($mostCommented as $comment)
					<li class="list-group-item">
						<span class="badge badge-info">{{ $comment->comments_count }}</span>
						{{ $comment->postname }}
					</li>
				@endforeach
			</ul>
		</div>
		<div class="card mt-4">
			<div class="card-body">
				<h4 class="card-title">Most Users:</h4>
				<p class="text-muted">Most Users post Written</p>
			</div>
			<ul class="list-group list-group-flush">
				@foreach ($mostWriters as $writer)

					<li class="list-group-item">
						<span class="badge badge-success">{{ $writer->posts_count }}</span>
						{{ $writer->name }}
					</li>
				@endforeach
			</ul>
		</div>

		<div class="card mt-4">
			<div class="card-body">
				<h4 class="card-title">Active Users:</h4>
				<p class="text-muted">Active Users in Last Mounth</p>
			</div>
			<ul class="list-group list-group-flush">
				@foreach ($usersActiveLastMounth as $writer)

					<li class="list-group-item">
						<span class="badge badge-danger">{{ $writer->posts_count }}</span>
						{{ $writer->name }}
					</li>
				@endforeach
			</ul>
		</div>
	</div>

	<div class="col-4">

	</div>
</div>

@endsection
