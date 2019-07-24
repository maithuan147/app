<?php

namespace App\Providers;

use App\User;
use App\Post;
use App\Information;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Contracts\IMediaRepository;
use App\Repositories\MediaRepository;
use App\Repositories\EloquentsRepository\PostEloquentRepository;
use App\Contracts\EloquentsDbRepository\IPostDbRepository;
use App\Contracts\EloquentsDbRepository\ITagDbRepository;
use App\Repositories\EloquentsRepository\TagEloquentRepository;
use App\Contracts\EloquentsDbRepository\ICategoryDbRepository;
use App\Repositories\EloquentsRepository\CategoryEloquentRepository;
use App\Contracts\EloquentsDbRepository\IRoleDbRepository;
use App\Repositories\EloquentsRepository\RoleEloquentRepository;
use App\Contracts\EloquentsDbRepository\IRestritedDbRepository;
use App\Repositories\EloquentsRepository\RestritedEloquentRepository;
use App\Contracts\EloquentsDbRepository\IMediaDbRepository;
use App\Repositories\EloquentsRepository\MediaEloquentRepository;
use App\Contracts\EloquentsDbRepository\IAdminDbRepository;
use App\Repositories\EloquentsRepository\AdminEloquentRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //$this->app->singleton(IPostDbRepository::class, PostEloquentRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(IPostDbRepository::class, PostEloquentRepository::class);
        $this->app->singleton(ITagDbRepository::class, TagEloquentRepository::class);
        $this->app->singleton(ICategoryDbRepository::class, CategoryEloquentRepository::class);
        $this->app->singleton(IRoleDbRepository::class, RoleEloquentRepository::class);
        $this->app->singleton(IRestritedDbRepository::class, RestritedEloquentRepository::class);
        $this->app->singleton(IMediaDbRepository::class, MediaEloquentRepository::class);
        $this->app->singleton(IAdminDbRepository::class, AdminEloquentRepository::class);
        $this->app->singleton(IMediaRepository::class, MediaRepository::class);

        View::composer('dashboard', function ($view) {
            $CountUser = User::count();
            $CountPost = Post::count();
            $data = ['countUser' => $CountUser,
                     'countPost' => $CountPost];
            $view->with($data);
        });

        View::composer('layouts.japanshop', function ($view) {
            $information = Information::first();
            $data = ['information' => $information];
            $view->with($data);
        });
    }
}
