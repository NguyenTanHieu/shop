<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\CategoryPost;
use App\Models\TagProduct;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();

        view()->composer('*', function($view){
            $cats_home=Category::orderBy('name', 'ASC')->where('status',1)->get();
            $tags = TagProduct::limit(12)->get();
            $carts=Cart::where('customer_id', auth('cus')->id())->get();
            $cats_home_post=CategoryPost::orderBy('name', 'ASC')->where('status',1)->get();
            $view->with(compact('cats_home','tags','cats_home_post','carts'));
        });
    }
}
