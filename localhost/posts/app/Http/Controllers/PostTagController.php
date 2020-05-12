<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class PostTagController extends Controller
{
    public  function    index($id)
    {
        $tag = Tag::with('posts')->findOrFail($id);
        return (view('posts.index', [
            'posts' => $tag->posts,
            // we comment that because we use ViewComposer
            // 'mostCommented' => [],
			// 'mostWriters' => [],
			// 'usersActiveLastMounth' =>  [],
			'tab' => 'list'
        ]));
    }
}
