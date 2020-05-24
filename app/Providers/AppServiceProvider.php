<?php

namespace App\Providers;

use App\Comment;
use App\Http\Resources\CommentResource;
use App\Http\ViewComposer\ActivityComposer;
use App\Observers\CommentObserve;
use App\Observers\PostObserve;
use App\Post;
use Illuminate\Http\Resources\Json\JsonResource;
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

        // this to remove data in comment resource response
        // CommentResource::withoutWrapping();

        // this to remove data in json response in all resources
        JsonResource::withoutWrapping();
    }
}
