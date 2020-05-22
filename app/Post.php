<?php

namespace App;

use App\Scopes\AdminScope;
use App\Scopes\LatestScopes;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{

	use		SoftDeletes;

	protected	$fillable = ['postname', 'description', 'password', 'status', 'user_id'];

	// we remove that we will use morphs
	// public	function	comments()
	// {
	// 	return $this->hasMany('App\Comment')->dernier();
	// }

	public	function	comments()
	{
		return $this->morphMany('App\Comment', 'commentable')->dernier();
	}

	public	function	user()
	{
		return $this->belongsTo(User::class);
	}

	public	function	image()
	{
		return $this->morphOne('App\Image', 'imageable');
	}

	public	function	scopeMostCommented(Builder $query)
	{
		return $query->withCount('comments')->orderBy('updated_at', 'desc');
	}

	public	function	scopePostTagComments(Builder $query)
	{
		return $query->withCount('comments')->with(['user', 'tags']);
	}

	public	static function boot()
	{
		static::addGlobalScope(new AdminScope);

		parent::boot();

		static::addGlobalScope(new LatestScopes);

		// we comment that because we will use observe
		// static::updating(function (Post $post)
		// {
		// 	Cache::forget("comment-post-show-{$post->id}");
		// 	Cache::forget("post-show-{$post->id}");
		// });

		// static::deleting(function (Post $post)
		// {
		// 	$post->comments()->delete();
		// });

		// static::restoring(function (post $post)
		// {
		// 	$post->comments()->restore();
		// });
	}

	// public	function	tags()
	// {
	// 	return ($this->belongsToMany("App\Tag")->withTimestamps());
	// }
	public	function	tags()
	{
		return $this->morphToMany("App\Tag", "taggable")->withTimestamps();
	}

}
