
@if (session()->has('status'))
    <div class="alert alert-secondary" role="alert">
        <strong>Info: </strong> {{ session()->get('status') }}
    </div>
@endif