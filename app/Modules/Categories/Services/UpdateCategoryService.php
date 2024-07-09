<?php

namespace App\Modules\Categories\Services;

use Exception;
use App\Modules\Categories\Services\Interfaces\UpdateCategoryServiceInterface;
use App\Modules\Categories\Requests\UpdateCategoryRequest;
use App\Modules\Categories\Repositories\Interfaces\CategoryRepositoryInterface;

class UpdateCategoryService implements UpdateCategoryServiceInterface
{
    private CategoryRepositoryInterface $categoryRepositoryInterface;

    public function __construct(
        CategoryRepositoryInterface $categoryRepositoryInterface
    ) {
        $this->categoryRepositoryInterface = $categoryRepositoryInterface;
    }

    public function execute(String $id, UpdateCategoryRequest $request): void {
        $this->categoryRepositoryInterface->update($id, [
            'description' => $request->description,
            'status' => $request->status
        ]);
    }
}
