<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$posts = App\Post::all();

		if ($posts->count() == 0)
		{
			$this->command->info("No Post detected...!");
			return ;
		}

		$users = App\User::all();

		if ($users->count() == 0)
		{
			$this->command->info("No User detected...!");
			return ;
		}

		$nbComment = (int)($this->command->ask("How many comment you want to add...?", 150));

		// factory(App\Comment::class, $nbComment)->make()->each(function ($comment) use ($posts, $users)
		// {
		// 	$comment->post_id = $posts->random()->id;
		// 	$comment->user_id = $users->random()->id;
		// 	$comment->save();
		// });

			factory(App\Comment::class, $nbComment)->make()->each(function ($comment) use ($posts, $users) {
				$comment->commentable_id = $posts->random()->id;
				$comment->commentable_type = 'App\Post';
				$comment->user_id = $users->random()->id;
				$comment->save();
			});

			factory(App\Comment::class, $nbComment)->make()->each(function ($comment) use ($users) {
				$comment->commentable_id = $users->random()->id;
				$comment->commentable_type = 'App\User';
				$comment->user_id = $users->random()->id;
				$comment->save();
			});
	}
}
