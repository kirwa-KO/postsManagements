<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostComment;

class UserCommentController extends Controller
{

    public  function __construct()
    {
        $this->middleware('auth');
    }

    public  function store(StorePostComment $request, User $user)
    {
        $user->comments()->create([
            'content' => $request->input('content'),
            'user_id' => $request->user()->id
        ]);
        return redirect()->back()->withStatus('User Commented Succesfly..!');
    }
}
