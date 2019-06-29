<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Reponsitories\PostEloquentRepository;
use App\Contracts\IPostDbRepository;
use App\Contracts\ITagDbRepository;
use App\Reponsitories\TagEloquentRepository;
use App\Contracts\ICatagoriesDbRepository;
use App\Reponsitories\CatagoriesEloquentRepository;
use App\Contracts\IRoleDbRepository;
use App\Reponsitories\RoleEloquentRepository;

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
        $this->app->singleton(ICatagoriesDbRepository::class, CatagoriesEloquentRepository::class);
        $this->app->singleton(IRoleDbRepository::class, RoleEloquentRepository::class);
    }
}
