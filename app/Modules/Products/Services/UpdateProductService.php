<?php

namespace App\Modules\Products\Services;

use Exception;
use App\Modules\Products\Services\Interfaces\UpdateProductServiceInterface;
use App\Modules\Products\Requests\UpdateProductRequest;
use App\Modules\Products\Repositories\Interfaces\ProductRepositoryInterface;
use App\Modules\Categories\Services\Interfaces\FindOneCategoryServiceInterface;
use App\Exceptions\NotFoundException;

class UpdateProductService implements UpdateProductServiceInterface
{
    private ProductRepositoryInterface $productRepositoryInterface;
    private FindOneCategoryServiceInterface $findOneCategoryServiceInterface;

    public function __construct(
        ProductRepositoryInterface $productRepositoryInterface,
        FindOneCategoryServiceInterface $findOneCategoryServiceInterface
    ) {
        $this->productRepositoryInterface = $productRepositoryInterface;
        $this->findOneCategoryServiceInterface = $findOneCategoryServiceInterface;
    }

    public function execute(String $id, UpdateProductRequest $request): void {
        $category = $this->findOneCategoryServiceInterface->execute($request->category_id);
        if (!$category) {
            throw new NotFoundException('Category not found.');
        }
        $this->productRepositoryInterface->update($id, [
            'category_id' => $request->category_id,
            'description' => $request->description,
        ]);
    }
}
