<?php

namespace App\Modules\Products\Repositories\Interfaces;

use App\Modules\Products\Models\Product;

interface ProductRepositoryInterface
{
    public function create(array $data): Product;
    public function findAll();
    public function findOne(String $id): ?Product;
    public function update(String $id, Array $data);
    public function delete(String $id);
}
