<?php

use App\Tag;
use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = collect(['sport', 'travel', 'traning', 'games', 'news', 'learning', 'traning']);

        $tags->each(function ($tag)
        {
            $mytag = new Tag();
            $mytag->name = $tag;
            $mytag->save();
        });

    }
}
