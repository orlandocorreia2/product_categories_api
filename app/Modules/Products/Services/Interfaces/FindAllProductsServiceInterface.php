<?php

namespace App\Modules\Products\Services\Interfaces;

use App\Modules\Products\Requests\CreateCategoryRequest;
use Illuminate\Pagination\LengthAwarePaginator;

interface FindAllProductsServiceInterface
{
    public function execute(): LengthAwarePaginator;
}
