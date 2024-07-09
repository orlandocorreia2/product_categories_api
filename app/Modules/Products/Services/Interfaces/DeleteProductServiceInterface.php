<?php

namespace App\Modules\Products\Services\Interfaces;

use App\Modules\Products\Requests\CreateCategoryRequest;
use App\Modules\Products\Models\Category;

interface DeleteProductServiceInterface
{
    public function execute(String $id): void;
}
