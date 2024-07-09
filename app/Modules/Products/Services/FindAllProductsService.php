<?php

namespace App\Modules\Products\Services;

use Exception;
use App\Modules\Products\Services\Interfaces\FindAllProductsServiceInterface;
use App\Modules\Products\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class FindAllProductsService implements FindAllProductsServiceInterface
{
    private ProductRepositoryInterface $productRepositoryInterface;

    public function __construct(
        ProductRepositoryInterface $productRepositoryInterface
    ) {
        $this->productRepositoryInterface = $productRepositoryInterface;
    }

    public function execute(): LengthAwarePaginator {
        return $this->productRepositoryInterface->findAll();
    }
}
