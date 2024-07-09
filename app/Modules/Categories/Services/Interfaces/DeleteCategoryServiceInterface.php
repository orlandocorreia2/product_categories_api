<?php

namespace App\Modules\Categories\Services\Interfaces;

use App\Modules\Categories\Requests\CreateCategoryRequest;
use App\Modules\Categories\Models\Category;

interface DeleteCategoryServiceInterface
{
    public function execute(String $id): void;
}
