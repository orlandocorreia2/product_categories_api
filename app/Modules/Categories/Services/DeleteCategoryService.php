<?php

namespace App\Modules\Categories\Services;

use Exception;
use App\Modules\Categories\Services\Interfaces\DeleteCategoryServiceInterface;
use App\Modules\Categories\Repositories\Interfaces\CategoryRepositoryInterface;

class DeleteCategoryService implements DeleteCategoryServiceInterface
{
    private CategoryRepositoryInterface $categoryRepositoryInterface;

    public function __construct(
        CategoryRepositoryInterface $categoryRepositoryInterface
    ) {
        $this->categoryRepositoryInterface = $categoryRepositoryInterface;
    }

    public function execute(String $id): void {
        $this->categoryRepositoryInterface->delete($id);
    }
}
