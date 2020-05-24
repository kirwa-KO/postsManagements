<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
	use HasApiTokens,Notifiable;


	public	const LOCALE = [
		'en' => 'English',
		'fr' => 'French',
		'ar' => 'Arabic',
	];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'email', 'password',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token', 'email_verified_at', 'created_at', 'updated_at'
	];

	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	public  function posts()
	{
		return $this->hasMany(Post::class);
	}

	// we remove that we use morph
	// public	function	comments()
	// {
	// 	return $this->hasMany(Comment::class);
	// }

	public	function	comments()
	{
		return $this->morphMany('App\Comment', 'commentable')->dernier();
	}


	public	function	image()
	{
		return $this->morphOne('App\Image', 'imageable');
	}

	public  function    scopeMostWriter(Builder $query)
	{
		return $query->withCount('posts')->orderBy('posts_count', 'desc');
	}

	public	function	scopeUserActiveLastMounth(Builder $query)
	{
		return $query->withCount(['posts'=> function (Builder $localQuery)
			{
				$localQuery->whereBetween(static::CREATED_AT, [now()->subMonth(10), now()]);
			}
		])->having('posts_count', '>', 3)
		  ->orderby('posts_count', 'desc');
	}

}
