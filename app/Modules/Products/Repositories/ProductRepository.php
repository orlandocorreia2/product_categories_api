<?php

namespace App\Modules\Products\Repositories;

use App\Modules\Products\Repositories\Interfaces\ProductRepositoryInterface;
use App\Modules\Products\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    public function create(array $data): Product
    {
        return Product::create($data);
    }

    public function findAll()
    {
        return Product::orderBy('created_at', 'desc')->paginate();
    }

    public function findOne(String $id): ?Product
    {
        return Product::find($id);
    }

    public function update(String $id, Array $data)
    {
        Product::whereId($id)->update($data);
    }

    public function delete(String $id)
    {
        Product::whereId($id)->delete();
    }
}
