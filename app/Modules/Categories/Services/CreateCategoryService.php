<?php

namespace App\Modules\Categories\Services;

use Exception;
use App\Modules\Categories\Services\Interfaces\CreateCategoryServiceInterface;
use App\Modules\Categories\Requests\CreateCategoryRequest;
use App\Exceptions\SystemUnavailableException;
use App\Modules\Categories\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Modules\Categories\Models\Category;

class CreateCategoryService implements CreateCategoryServiceInterface
{
    private CategoryRepositoryInterface $categoryRepositoryInterface;

    public function __construct(
        CategoryRepositoryInterface $categoryRepositoryInterface
    ) {
        $this->categoryRepositoryInterface = $categoryRepositoryInterface;
    }

    public function execute(CreateCategoryRequest $request): Category {
        $category = $this->categoryRepositoryInterface->create([
            'description' => $request->description,
            'status' => $request->status || true
        ]);
        if (!$category) {
            throw new SystemUnavailableException('Category cannot be created, please try again later');
        }
        return $category;
    }
}
