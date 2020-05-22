<?php

namespace App;

use App\Scopes\LatestScopes;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
	use SoftDeletes;

	protected	$fillable = ['content', 'user_id'];

	
	public function post()
	{
		return $this->belongsTo('App\Post');
	}

	public	function user()
	{
		return $this->belongsTo('App\User');
	}

	// we use that we will use morphs
	public	function commentable()
	{
		return $this->morphTo();
	}

	public  function	scopeDernier(Builder $query)
	{
		return $query->orderBy(static::UPDATED_AT, 'desc');
	}

	public	static function boot()
	{
		parent::boot();

		static::addGlobalScope(new LatestScopes);
		
		// we comment that because we use observer
		// static::creating(function (Comment $comment)
		// {
		// 	// Cache::forget("post-show-{$comment->post->id}");
		// 	// because now we use morph
		// 	Cache::forget("post-show-{$comment->commentable->id}");
		// });
	}

	public	function	tags()
	{
		return $this->morphToMany("App\Tag", "taggable")->withTimestamps();
	}
	
}
