<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostComment;
use App\Post;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{
    public  function store(StorePostComment $request, Post $post)
    {
        $post->comments()->create([
            'content' => $request->input('content'),
            'user_id' => $request->user()->id
        ]);
        return redirect()->back();
    }
}
