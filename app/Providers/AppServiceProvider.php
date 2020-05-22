<?php

namespace App\Providers;

use App\Comment;
use App\Http\ViewComposer\ActivityComposer;
use App\Observers\CommentObserve;
use App\Observers\PostObserve;
use App\Post;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        // because we include a sidebar view in posts.show view
        // view()->composer(
        //     ['posts.index', 'posts.show']
        //     , ActivityComposer::class
        // );

        view()->composer(
            ['posts.index', 'posts.sidebar']
            , ActivityComposer::class
        );

        Post::observe(PostObserve::class);
        Comment::observe(CommentObserve::class);
    }
}
