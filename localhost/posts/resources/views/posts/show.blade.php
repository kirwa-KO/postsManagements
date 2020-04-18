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


@endsection
