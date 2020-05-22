@component('mail::message')
# Introduction

Someone comment in your post



@component('mail::button', ['url' => route('posts.show', ['post' => $comment->commentable->id])])
{{ $comment->commentable->postname }}
@endcomponent

@component('mail::button', ['url' => route('users.show', ['user' => $comment->user->id])])
{{ $comment->user->name }} profile
@endcomponent

@component('mail::panel')
{{ $comment->content }}.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent


