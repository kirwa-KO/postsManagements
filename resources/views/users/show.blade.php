@extends('layout')

@section('content')


<div class="row">
	<div class="col-md-4 mt-4">
		<h5>Select Avatar</h5>
		<img src=" {{ $user->image ? $user->image->url() : '' }} " alt="user image" class="img-thumbnail avatar">
		<a class="btn btn-info btn-sm" href="{{ route('users.edit', ['user' => $user->id]) }}">Edit</a>
	</div>
	<div class="col-md-8 mt-4">
		<div class="form-group">
			<h3>{{ $user->name }}</h3>
			<x-comment-form :action="route('users.comment.store', ['user' => $user->id])"></x-comment-form>
			<hr>
			<x-comment-list :comments="$user->comments"></x-comment-list>
		</div>
	</div>
</div>

@endsection