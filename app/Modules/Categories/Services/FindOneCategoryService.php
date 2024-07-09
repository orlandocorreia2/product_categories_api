<?php

namespace App\Modules\Categories\Services;

use Exception;
use App\Modules\Categories\Services\Interfaces\FindOneCategoryServiceInterface;
use App\Modules\Categories\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Modules\Categories\Models\Category;
use App\Exceptions\NotFoundException;

class FindOneCategoryService implements FindOneCategoryServiceInterface
{
    private CategoryRepositoryInterface $categoryRepositoryInterface;

    public function __construct(
        CategoryRepositoryInterface $categoryRepositoryInterface
    ) {
        $this->categoryRepositoryInterface = $categoryRepositoryInterface;
    }

    public function execute(String $id): Category {
        $category = $this->categoryRepositoryInterface->findOne($id);
        if (!$category) {
            throw new NotFoundException('Category not found.');
        }
        return $category;
    }
}
