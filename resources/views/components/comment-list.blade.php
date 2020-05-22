<h1 class="badge badge-warning"> Comments: </h1>

@foreach ($comments as $comment)
    <p class="text-muted">{{ $comment->content }}</p>
    <p class="badge badge-success">Added : {{ $comment->updated_at->diffForHumans() }}, By {{ $comment->user->name }}</p>
@endforeach