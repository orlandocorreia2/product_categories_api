<?php

namespace App\Modules\Products\Services;

use Exception;
use App\Modules\Products\Services\Interfaces\DeleteProductServiceInterface;
use App\Modules\Products\Repositories\Interfaces\ProductRepositoryInterface;

class DeleteProductService implements DeleteProductServiceInterface
{
    private ProductRepositoryInterface $productRepositoryInterface;

    public function __construct(
        ProductRepositoryInterface $productRepositoryInterface
    ) {
        $this->productRepositoryInterface = $productRepositoryInterface;
    }

    public function execute(String $id): void {
        $this->productRepositoryInterface->delete($id);
    }
}
