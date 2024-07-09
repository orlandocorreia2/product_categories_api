<?php

namespace App\Modules\Products\Services\Interfaces;

use App\Modules\Products\Requests\CreateProductRequest;
use App\Modules\Products\Models\Product;

interface FindOneProductServiceInterface
{
    public function execute(String $id): Product;
}
