<?php

namespace App\Modules\Categories\Providers;

use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind('App\Modules\Categories\Repositories\Interfaces\CategoryRepositoryInterface', 'App\Modules\Categories\Repositories\CategoryRepository');
        $this->app->bind('App\Modules\Categories\Services\Interfaces\CreateCategoryServiceInterface', 'App\Modules\Categories\Services\CreateCategoryService');
        $this->app->bind('App\Modules\Categories\Services\Interfaces\FindAllCategoriesServiceInterface', 'App\Modules\Categories\Services\FindAllCategoriesService');
        $this->app->bind('App\Modules\Categories\Services\Interfaces\FindOneCategoryServiceInterface', 'App\Modules\Categories\Services\FindOneCategoryService');
        $this->app->bind('App\Modules\Categories\Services\Interfaces\UpdateCategoryServiceInterface', 'App\Modules\Categories\Services\UpdateCategoryService');
        $this->app->bind('App\Modules\Categories\Services\Interfaces\DeleteCategoryServiceInterface', 'App\Modules\Categories\Services\DeleteCategoryService');
    }

    public function boot(): void
    {
        // 
    }
}
