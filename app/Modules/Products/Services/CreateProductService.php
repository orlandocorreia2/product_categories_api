<?php

namespace App\Modules\Products\Services;

use Exception;
use App\Modules\Products\Services\Interfaces\CreateProductServiceInterface;
use App\Modules\Products\Requests\CreateProductRequest;
use App\Exceptions\SystemUnavailableException;
use App\Modules\Products\Repositories\Interfaces\ProductRepositoryInterface;
use App\Modules\Categories\Services\Interfaces\FindOneCategoryServiceInterface;
use App\Modules\Products\Models\Product;
use App\Exceptions\NotFoundException;

class CreateProductService implements CreateProductServiceInterface
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

    public function execute(CreateProductRequest $request): Product {
        $category = $this->findOneCategoryServiceInterface->execute($request->category_id);
        if (!$category) {
            throw new NotFoundException('Category not found.');
        }
        $product = $this->productRepositoryInterface->create([
            'category_id' => $request->category_id,
            'description' => $request->description,
        ]);
        if (!$product) {
            throw new SystemUnavailableException('Product cannot be created, please try again later');
        }
        return $product;
    }
}
