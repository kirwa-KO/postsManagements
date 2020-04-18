<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class NewController extends Controller
{
	public	function about(){
		return (view("about"));
	}
	public	function welcome()
	{
		// return (view("welcome", [
		// 	'posts' => Post::all()
		// ]));
		return (view("welcome"));
	}
	// public	function posts($id, $author = "kirwa")
	// {
	// 	$posts = [
	// 		1 => ["title" => "First Post..!"],
	// 		2 => ["title" => "Second Post"],
	// 	];
	// 	return (view("posts.articles",[
	// 		"data" => $posts[$id],
	// 		"author" => $author
	// 	]
	// 	));
	// }
}
