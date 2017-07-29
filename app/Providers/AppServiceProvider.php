<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Tag;
use App\User;
use App\Post;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.sidebar', function($view) {
            $tags = Tag::has('posts')->pluck('name');
            $authors = User::has('posts')->pluck('name');
            $archives = Post::archives();

            $view->with(compact('tags', 'authors', 'archives'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
