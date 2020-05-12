<?php

namespace App;

use App\Scopes\AdminScope;
use App\Scopes\LatestScopes;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

	use		SoftDeletes;

	protected	$fillable = ['postname', 'description', 'password', 'status', 'user_id'];
	public	function	comments()
	{
		return $this->hasMany('App\Comment')->dernier();
	}

	public	function	user()
	{
		return $this->belongsTo(User::class);
	}

	public	function	scopeMostCommented(Builder $query)
	{
		return $query->withCount('comments')->orderBy('updated_at', 'desc');
	}

	public	static function boot()
	{
		static::addGlobalScope(new AdminScope);

		parent::boot();

		static::addGlobalScope(new LatestScopes);

		static::updating(function (Post $post)
		{
			Cache::forget("comment-post-show-{$post->id}");
			Cache::forget("post-show-{$post->id}");
		});

		static::deleting(function (Post $post)
		{
			$post->comments()->delete();
		});

		static::restoring(function (post $post)
		{
			$post->comments()->restore();
		});
	}

	public	function	tags()
	{
		return ($this->belongsToMany("App\Tag")->withTimestamps());
	}

}
