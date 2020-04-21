<div class="card {{ isset($mt) ? $mt : null }}">
	<div class="card-body">
		<h4 class="card-title">{{ $title }}</h4>
		<p class="text-muted">{{ isset($paragraph) ? $paragraph : null }}</p>
	</div>
	<ul class="list-group list-group-flush">
		@if (empty(trim($slot)))
			@foreach ($items as $item)
			<li class="list-group-item">
				<span class="badge badge-{{ $type }}">{{ $item->posts_count }}</span>
				{{ $item->name }}
			</li>
			@endforeach
		@else
			{{ $slot }}
		@endif
	</ul>
</div>
