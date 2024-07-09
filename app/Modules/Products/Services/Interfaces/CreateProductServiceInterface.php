<?php

namespace App\Modules\Products\Services\Interfaces;

use App\Modules\Products\Requests\CreateProductRequest;
use App\Modules\Products\Models\Product;

interface CreateProductServiceInterface
{
    public function execute(CreateProductRequest $request): Product;
}
