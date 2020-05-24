@extends('layout')

@section('content')


<form action="{{ route('users.update', ['user'=> $user->id]) }}" method="POST" enctype="multipart/form-data">
	
	@method('PATCH')
	@csrf

	<div class="row">
		<div class="col-md-4 mt-4">
			<h5>Select Avatar</h5>
			<img src=" {{ $user->image ? $user->image->url() : '' }} " alt="" class="img-thumbnail avatar">
			<input type="file" name="avatar" id="avatar" class="form-control-file">
		</div>
		<div class="col-md-8 mt-4">
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" name="name" id="name" class="form-control">
			</div>
			<div class="form-group">
				<label for="locale">Language</label>
				<select name="locale" id="locale" class="form-control">
					@foreach (App\User::LOCALE as $locale => $label)
						<option value="{{ $locale }}" {{ $user->locale == $locale ? 'selected' : '' }}> {{ $label }}</option>
					@endforeach
				</select>
			</div>
			<x-errors></x-errors>
			<button class="btn btn-warning btn-block">Update</button>
		</div>
	</div>
</form>

@endsection