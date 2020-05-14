<x-card title="Most Commented Posts:"
		paragraph=""
		type=""
		items=""
		mt=""
		>
	@foreach ($mostCommented as $post)
		<li class="list-group-item">
			<span class="badge badge-info">{{ $post->comments_count }}</span>
			<a href=" {{ route('posts.show', ['post' => $post->id ]) }} "> {{ $post->postname }}</a>
		</li>
	@endforeach
</x-card>

{{-- <div class="card mt-4">
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
</div> --}}
<x-card
	title="Most Users:"
	paragraph="Most Users post Written"
	type="success"
	:items="$mostWriters"
	mt="mt-4"
	>
</x-card>

<x-card
	title="Active Users:"
	paragraph="Active Users in Last Mounth"
	type="danger"
	:items="$usersActiveLastMounth"
	mt="mt-4"
	>

</x-card>