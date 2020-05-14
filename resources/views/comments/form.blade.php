@auth
<form method="POST" action="{{ route('posts.comment.store', ['post' => $id]) }}" class="my-3">
	@csrf
	<textarea name="content" id="content" rows="3" class="form-control"></textarea>
	<button class="btn btn-block btn-primary mt-3" type="submit">Create Comment</button>
</form>

@else

    <a href="" class="btn btn-success btn-sm my-3">SingIn</a> to post a comment

@endauth

<x-errors></x-errors>