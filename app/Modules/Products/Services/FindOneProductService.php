<?php

namespace App\Modules\Products\Services;

use Exception;
use App\Modules\Products\Services\Interfaces\FindOneProductServiceInterface;
use App\Modules\Products\Repositories\Interfaces\ProductRepositoryInterface;
use App\Modules\Products\Models\Product;
use App\Exceptions\NotFoundException;

class FindOneProductService implements FindOneProductServiceInterface
{
    private ProductRepositoryInterface $productRepositoryInterface;

    public function __construct(
        ProductRepositoryInterface $productRepositoryInterface
    ) {
        $this->productRepositoryInterface = $productRepositoryInterface;
    }

    public function execute(String $id): Product {
        $product = $this->productRepositoryInterface->findOne($id);
        if (!$product) {
            throw new NotFoundException('Product not found.');
        }
        return $product;
    }
}
