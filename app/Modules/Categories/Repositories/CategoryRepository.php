<?php

namespace App\Modules\Categories\Repositories;

use App\Modules\Categories\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Modules\Categories\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function create(array $data): Category
    {
        return Category::create($data);
    }

    public function findAll()
    {
        return Category::orderBy('created_at', 'desc')->paginate();
    }

    public function findOne(String $id): ?Category
    {
        return Category::find($id);
    }

    public function update(String $id, Array $data)
    {
        Category::whereId($id)->update($data);
    }

    public function delete(String $id)
    {
        Category::whereId($id)->delete();
    }
}
