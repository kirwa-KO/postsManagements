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
        $nbComment = (int)($this->command->ask("How many comment you want to add...?", 500));
        factory(App\Comment::class, $nbComment)->make()->each(function ($comment) use ($posts)
        {
            $comment->post_id = $posts->random()->id;
            $comment->save();
        });
    }
}
