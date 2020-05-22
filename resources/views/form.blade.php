<div class="form-group">
	<label for="postname">Title of Post</label>
	<input type="text" class="form-control" id="postname" name="postname" value="{{ old('postname', $post->postname ?? null) }}" placeholder="Post name">

<div>
{{-- <br>
<br> --}}
<div class="form-group">
	<label for="description">The contant of Post</label>
	<input class="form-control" name="description" id="description" type="text" value=" {{ old('description', $post->description ?? null) }}" placeholder="Description">
</div>

<div class="form-group">
	<label for="picture">Picture</label>
	<input type="file" name="picture" id="picture" class="form-control-file">
</div>

{{-- <br> --}}

<x-errors my-class="warning"></x-errors>
<br>
