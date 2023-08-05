<?php
 
namespace App\Providers;
 
use App\View\Composers\User;
use App\View\Composers\Menu;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
 
class ViewServiceProvider extends ServiceProvider
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
        View::composer('*', User::class);
        View::composer('*', Menu::class);

        Paginator::useBootstrap();
    }
}