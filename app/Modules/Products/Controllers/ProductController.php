<?php

namespace App\Modules\Products\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Products\Requests\CreateProductRequest;
use App\Modules\Products\Requests\UpdateProductRequest;
use App\Modules\Products\Services\Interfaces\CreateProductServiceInterface;
use App\Modules\Products\Services\Interfaces\FindAllProductsServiceInterface;
use App\Modules\Products\Services\Interfaces\FindOneProductServiceInterface;
use App\Modules\Products\Services\Interfaces\UpdateProductServiceInterface;
use App\Modules\Products\Services\Interfaces\DeleteProductServiceInterface;

class ProductController extends Controller
{
    private CreateProductServiceInterface $createProductServiceInterface;
    private FindAllProductsServiceInterface $findAllProductsServiceInterface;
    private FindOneProductServiceInterface $findOneProductServiceInterface;
    private UpdateProductServiceInterface $updateProductServiceInterface;
    private DeleteProductServiceInterface $deleteProductServiceInterface;

    public function __construct(
        CreateProductServiceInterface $createProductServiceInterface, 
        FindAllProductsServiceInterface $findAllProductsServiceInterface,
        FindOneProductServiceInterface $findOneProductServiceInterface,
        UpdateProductServiceInterface $updateProductServiceInterface,
        DeleteProductServiceInterface $deleteProductServiceInterface,
    ) {
        $this->createProductServiceInterface = $createProductServiceInterface;
        $this->findAllProductsServiceInterface = $findAllProductsServiceInterface;
        $this->findOneProductServiceInterface = $findOneProductServiceInterface;
        $this->updateProductServiceInterface = $updateProductServiceInterface;
        $this->deleteProductServiceInterface = $deleteProductServiceInterface;
    }

    public function create(CreateProductRequest $request)
    {
        try {
            $product = $this->createProductServiceInterface->execute($request);
            return response()->json($product, 201);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode() ?? 500);
        }
    }

    public function findAll()
    {
        try {
            $products = $this->findAllProductsServiceInterface->execute();
            return response()->json($products, 200);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode() ?? 500);
        }
    }

    public function findOne(String $id)
    {
        try {
            $product = $this->findOneProductServiceInterface->execute($id);
            return response()->json($product, 200);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode() ?? 500);
        }
    }

    public function update(String $id, UpdateProductRequest $request)
    {
        try {
            $this->updateProductServiceInterface->execute($id, $request);
            return response()->json([], 204);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode() ?? 500);
        }
    }

    public function destroy(String $id)
    {
        try {
            $this->deleteProductServiceInterface->execute($id);
            return response()->json([], 204);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode() ?? 500);
        }
    }
}
