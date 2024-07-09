<?php

namespace App\Modules\Products\Services\Interfaces;

use App\Modules\Products\Requests\CreateProductRequest;
use App\Modules\Products\Models\Product;
use App\Modules\Products\Requests\UpdateProductRequest;

interface UpdateProductServiceInterface
{
    public function execute(String $id, UpdateProductRequest $request): void;
}
