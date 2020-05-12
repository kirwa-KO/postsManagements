<?php

namespace App;

use App\Scopes\LatestScopes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
	use SoftDeletes;

	public function post()
	{
		return $this->belongsTo('App\Post');
	}

	public	function user()
	{
		return $this->belongsTo('App\User');
	}

	public  function	scopeDernier(Builder $query)
	{
		return $query->orderBy(static::UPDATED_AT, 'desc');
	}

	public	static function boot()
	{
		parent::boot();

		static::addGlobalScope(new LatestScopes);
	}
}
