<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePost;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
	  // dd(\App\Post::all());
		return (view('posts.index', [
			'posts' => Post::all()
		]));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		// dd(\App\Post::find($id));
		return (view('posts.show', [
			'post' => Post::findOrFail($id)
		]));
	}
	public  function create()
	{
		return (view('posts.create'));
	}
	public function store(StorePost $request)
	{
		// $validate = $request->validate([
		// 	'title' => 'bail|required|min:5|max:100',
		// 	'content' => 'required'
		// ]);
		// $post = new Post();
		//$data['postname'] = $request->input('postname');
		//$data['description'] = $request->input('description');
		// $post->password = password_hash('you can do it...!', PASSWORD_DEFAULT);
		// $post->status = "active";
		// $post->save();
		$data = $request->only('postname', 'description');
		$data['password'] = password_hash('you can do it...!', PASSWORD_DEFAULT);
		$data['status'] = 'active';
		$post = Post::create($data);
		// return redirect()->route('posts.show', ['post' => $post->id]);

		$request->session()->flash('status', 'Post Added Succesfly...!');
		return redirect()->route('posts.index');
	}
	public	function edit($id)
	{
		$post = Post::findOrFail($id);
		return (view('posts.edit', [
			'post' => $post
		]));
	}
	public	function update(StorePost $request, $id)
	{
		$post = Post::findOrFail($id);
		$post->postname = $request->input('postname');
		$post->description = $request->input('description');
		$post->password = password_hash('Edited', PASSWORD_DEFAULT);
		$post->status = 'active';
		$post->save();
		$request->session()->flash('status', 'Post updated Succesfly..!');
		return redirect()->route('posts.index');
	}
	public	function destroy(Request $request, $id)
	{
		$post = Post::findOrFail($id);
		$post->delete();
		$request->session()->flash('status', 'Post Remove Succesfly..!');
		return redirect()->route('posts.index');
	}
}
