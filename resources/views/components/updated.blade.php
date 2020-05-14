<div class="text-muted">
        {{ empty(trim($slot)) ? "Updated at: " : $slot }}
        {{ $date }} {{ isset($name) ? ", By $name" : null}}

</div>
