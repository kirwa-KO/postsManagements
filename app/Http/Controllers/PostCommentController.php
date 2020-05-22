<?php

namespace App\Http\Controllers;

use App\Events\CommentPosted as MyEventsCommentPosted;
use App\Http\Requests\StorePostComment;
use App\Jobs\NotifyCommentedPost;
use App\Mail\CommentedPostMarkdown;
use App\Mail\CommentPosted;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PostCommentController extends Controller
{

    public  function __construct()
    {
        $this->middleware('auth');
    }

    public  function store(StorePostComment $request, Post $post)
    {
        $comment = $post->comments()->create([
            'content' => $request->input('content'),
            'user_id' => $request->user()->id
        ]);

        // Mail::to($post->user->email)->send(new CommentPosted($comment));
        // we will use markdown
        // Mail::to($post->user->email)->send(new CommentedPostMarkdown($comment));

        // to use queue 
        // Mail::to($post->user->email)->queue(new CommentedPostMarkdown($comment));

        // to put in queue and send it after a minute
        // $when = now()->addMinutes(1);
        // Mail::to($post->user->email)->later($when, new CommentedPostMarkdown($comment));

        // we comment that because we will use events
        // Mail::to($post->user->email)->queue(new CommentedPostMarkdown($comment));
        // NotifyCommentedPost::dispatch($comment);

        event(new MyEventsCommentPosted($comment));

        return redirect()->back();
    }
}
