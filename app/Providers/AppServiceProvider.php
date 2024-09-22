<?php

namespace App\Providers;

use App\Repositories\Category\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Category\CategoryRepository;

use App\Repositories\Product\Interfaces\ProductRepositoryInterface;
use App\Repositories\Product\ProductRepository;

use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Vite::prefetch(concurrency: 3);
    }
}
