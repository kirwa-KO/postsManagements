<?php

namespace   App\Http\ViewComposer;

use App\Post;
use App\User;
use Illuminate\View\View;
use Illuminate\Support\Facades\Cache;

class	ActivityComposer{
	
	public	function	compose(View $view)
	{
		$mostCommented = Cache::remember('mostCommented', now()->addSeconds(10), function ()
		{
			return (Post::mostCommented()->take(5)->get());
		});

		$mostWriters = Cache::remember('mostWriters', now()->addSeconds(10), function ()
		{
			return (User::mostWriter()->take(5)->get());
		});

		$usersActiveLastMounth = Cache::remember('usersActiveLastMounth', now()->addSeconds(10), function ()
		{
			return (User::userActiveLastMounth()->take(5)->get());
		});

		$view->with(
			[
				'mostCommented' => $mostCommented,
				'mostWriters' => $mostWriters,
				'usersActiveLastMounth' => $usersActiveLastMounth
			]);

	}

}