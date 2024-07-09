<?php

namespace App\Modules\Categories\Services\Interfaces;

use App\Modules\Categories\Requests\CreateCategoryRequest;
use App\Modules\Categories\Models\Category;
use App\Modules\Categories\Requests\UpdateCategoryRequest;

interface UpdateCategoryServiceInterface
{
    public function execute(String $id, UpdateCategoryRequest $request): void;
}
