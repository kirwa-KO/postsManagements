<?php

namespace App\Http\Controllers;


use App\Post;
use App\User;
use App\Comment;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use App\Http\Requests\StorePost;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */

	public function __construct()
	{
		$this->middleware('auth')->except('index', 'show');
	}

	public function index()
	{
	  // dd(\App\Post::all());
		// DB::connection()->enableQueryLog();
		//$posts = Post::all(); // lazy mode
		// $posts = Post::with('comments')->get(); // egire mode
		// foreach($posts as $post)
		// {
		// 	foreach ($post->comments as $comm)
		// 	{
		// 		dump($comm);
		// 	}
		// }
		// dd(DB::getQueryLog());


		// return (view('posts.index', [
		// 	'posts' => Post::all()
		// ]));


		// $posts = Post::withCount('comments')->orderBy('updated_at', 'desc')->get();
		$posts = Post::withCount('comments')->get();

		// $user = User::withCount('posts')->get();

		// dd($user);

		return (view('posts.index', [
			'posts' => $posts,
			'mostCommented' => Post::mostCommented()->take(5)->get(),
			'mostWriters' => User::mostWriter()->take(5)->get(),
			'usersActiveLastMounth' => User::userActiveLastMounth()->take(5)->get(),
			'tab' => 'list'
		]));



	}

	public function archive()
	{
		// $posts = Post::onlyTrashed()->withCount('Comments')->orderBy('updated_at', 'desc')->get();
		$posts = Post::onlyTrashed()->withCount('Comments')->get();

		return (view('posts.index', [
			'posts' => $posts,
			'tab' => 'archive'
		]));
	}

	public function all()
	{
		// $posts = Post::withTrashed()->withCount('Comments')->orderBy('updated_at', 'desc')->get();

		$posts = Post::withTrashed()->withCount('Comments')->get();

		return (view('posts.index', [
			'posts' => $posts,
			'tab' => 'all'
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
			'post' => Post::findOrFail($id),
			'comments' => Comment::where('post_id', $id)->get()
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
		$data['user_id'] = $request->user()->id;
		$post = Post::create($data);
		// return redirect()->route('posts.show', ['post' => $post->id]);

		$request->session()->flash('status', 'Post Added Succesfly...!');
		return redirect()->route('posts.index');
	}
	public	function edit($id)
	{
		$post = Post::findOrFail($id);

		if (Gate::denies('update', $post))
			abort(403, "You can't edit this post..?");

		return (view('posts.edit', [
			'post' => $post
		]));
	}
	public	function update(StorePost $request, $id)
	{
		$post = Post::findOrFail($id);

		if (Gate::denies('update', $post))
		{
			abort(403, "You can't change this Post...!");
		}

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
		$this->authorize('delete', $post);
		$post->delete();
		$request->session()->flash('status', 'Post Remove Succesfly..!');
		return redirect()->route('posts.index');
	}

	public	function restore($id)
	{
		$post = Post::onlyTrashed()->where('id', $id)->first();
		$this->authorize('restore', $post);
		$post->restore();
		return redirect()->back();
	}
	public	function forcedelete($id)
	{
		$post = Post::onlyTrashed()->where('id', $id)->first();
		$this->authorize('forceDelete', $post);
		$post->forcedelete();
		return redirect()->back();
	}
}
