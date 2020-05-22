<div class="text-muted">
        {{ empty(trim($slot)) ? "Created at: " : $slot }}
        
        {{ $date }} {!! isset($name) ? ", By <a href='" . route('users.show', ['user' => $userId]) . "'>". $name . "</a>" : null !!}

</div>
