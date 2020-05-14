<?php

use App\Tag;
use App\Post;
use Illuminate\Database\Seeder;

class TagPostsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$tagsCount = Tag::count();
		
		Post::all()->each(function ($post) use ($tagsCount)
		{
			$tag = random_int(1, $tagsCount);

			$tagIds = Tag::inRandomOrder()->take($tag)->get()->pluck('id');

			$post->tags()->sync($tagIds);

		});

	}
}
