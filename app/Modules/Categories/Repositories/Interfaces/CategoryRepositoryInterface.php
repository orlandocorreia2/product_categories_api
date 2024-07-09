<?php

namespace App\Modules\Categories\Repositories\Interfaces;

use App\Modules\Categories\Models\Category;

interface CategoryRepositoryInterface
{
    public function create(array $data): Category;
    public function findAll();
    public function findOne(String $id): ?Category;
    public function update(String $id, Array $data);
    public function delete(String $id);
}
