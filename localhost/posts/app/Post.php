<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

	use		SoftDeletes;

	protected	$fillable = ['postname', 'description', 'password', 'status'];
	public	function	comments()
	{
		return $this->hasMany('App\Comment');
	}

	public	function	user()
	{
		return $this->belongsTo(User::class);
	}

	public	static function boot()
	{
		parent::boot();

		static::deleting(function (Post $post)
		{
			$post->comments()->delete();
		});

		static::restoring(function (post $post)
		{
			$post->comments()->restore();
		});
	}
}
