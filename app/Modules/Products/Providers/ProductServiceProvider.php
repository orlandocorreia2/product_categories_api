<?php

namespace App\Modules\Products\Providers;

use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind('App\Modules\Products\Repositories\Interfaces\ProductRepositoryInterface', 'App\Modules\Products\Repositories\ProductRepository');
        $this->app->bind('App\Modules\Products\Services\Interfaces\CreateProductServiceInterface', 'App\Modules\Products\Services\CreateProductService');
        $this->app->bind('App\Modules\Products\Services\Interfaces\FindAllProductsServiceInterface', 'App\Modules\Products\Services\FindAllProductsService');
        $this->app->bind('App\Modules\Products\Services\Interfaces\FindOneProductServiceInterface', 'App\Modules\Products\Services\FindOneProductService');
        $this->app->bind('App\Modules\Products\Services\Interfaces\UpdateProductServiceInterface', 'App\Modules\Products\Services\UpdateProductService');
        $this->app->bind('App\Modules\Products\Services\Interfaces\DeleteProductServiceInterface', 'App\Modules\Products\Services\DeleteProductService');
    }

    public function boot(): void
    {
        // 
    }
}
