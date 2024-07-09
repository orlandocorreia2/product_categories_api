<?php

namespace App\Modules\Categories\Services;

use Exception;
use App\Modules\Categories\Services\Interfaces\FindAllCategoriesServiceInterface;
use App\Modules\Categories\Repositories\Interfaces\CategoryRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class FindAllCategoriesService implements FindAllCategoriesServiceInterface
{
    private CategoryRepositoryInterface $categoryRepositoryInterface;

    public function __construct(
        CategoryRepositoryInterface $categoryRepositoryInterface
    ) {
        $this->categoryRepositoryInterface = $categoryRepositoryInterface;
    }

    public function execute(): LengthAwarePaginator {
        return $this->categoryRepositoryInterface->findAll();
    }
}
