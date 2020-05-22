@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{-- <h1>{{ __('message.welcome') }}</h1> --}}
                    {{-- same as above --}}
                    <h1>@lang('message.welcome')</h1>

                    <p>@lang('message.hello', ['name' => Auth::user()->name ])</p>

                    <p> {{ trans_choice('message.plural', 0) }} </p>
                    <p> {{ trans_choice('message.plural', 1) }} </p>
                    <p> {{ trans_choice('message.plural', 20) }} </p>

                    {{-- we use in this case json file --}}
                    <h1>@lang('welcome')</h1>

                    <p>@lang('hello', ['name' => Auth::user()->name ])</p>

                    <p> {{ trans_choice('plural', 0) }} </p>
                    <p> {{ trans_choice('plural', 1) }} </p>
                    <p> {{ trans_choice('plural', 20) }} </p>

                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @can('secret.page')
                    <a href="/secret">Adminstrator</a>
                    @endcan
                    <h4>You are logged in!</h4>
                    <button class="btn btn-primary"><a href="{{ route('posts.index') }}" style="color: white;">Posts</a></button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
