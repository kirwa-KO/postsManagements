<div class="form-group">
	<label for="postname">Title of Post</label>
	<input class="form-control" name="postname" id="postname" type="text">
<div>
{{-- <input name="postname" id="postname" type="text" value="{{ old('postname', $post->postname ?? null) }}"> --}}
{{-- <br>
<br> --}}
<div class="form-group">
	<label for="description">The contant of Post</label>
	<input class="form-control" name="description" id="description" type="text">
</div>
{{-- <input name="description" id="description" type="text" value="{{ old('description',$post->description ?? null) }}"> --}}
{{-- <br> --}}
@if ($errors->any())
<ul>
	@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
	@endforeach
</ul>
@endif
<br>
