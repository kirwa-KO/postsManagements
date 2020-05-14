<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = App\User::all();
        if ($users->count() == 0)
        {
            $this->command->info("No users detected....!");
            return ;
        }
        $nbPosts = $this->command->ask("How many Post you want to make...?", 100);
       	factory(App\Post::class, (int)($nbPosts))->make()->each(function ($post) use ($users)
		{
			$post->user_id = $users->random()->id;
			$post->save();
		});
    }
}
