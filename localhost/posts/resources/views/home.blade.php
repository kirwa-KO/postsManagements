@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="/secret">Adminstrator</a>
                    <h4>You are logged in!</h4>
                    <button class="btn btn-primary"><a href="{{ route('posts.index') }}" style="color: white;">Posts</a></button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
