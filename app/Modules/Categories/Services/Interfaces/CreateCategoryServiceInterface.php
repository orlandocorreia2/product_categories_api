<?php

namespace App\Modules\Categories\Services\Interfaces;

use App\Modules\Categories\Requests\CreateCategoryRequest;
use App\Modules\Categories\Models\Category;

interface CreateCategoryServiceInterface
{
    public function execute(CreateCategoryRequest $request): Category;
}
