<?php

namespace App\Modules\Categories\Services\Interfaces;

use App\Modules\Categories\Requests\CreateCategoryRequest;
use Illuminate\Pagination\LengthAwarePaginator;

interface FindAllCategoriesServiceInterface
{
    public function execute(): LengthAwarePaginator;
}
