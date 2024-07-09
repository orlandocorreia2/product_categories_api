<?php

namespace App\Modules\Categories\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Categories\Requests\CreateCategoryRequest;
use App\Modules\Categories\Requests\UpdateCategoryRequest;
use App\Modules\Categories\Services\Interfaces\CreateCategoryServiceInterface;
use App\Modules\Categories\Services\Interfaces\FindAllCategoriesServiceInterface;
use App\Modules\Categories\Services\Interfaces\FindOneCategoryServiceInterface;
use App\Modules\Categories\Services\Interfaces\UpdateCategoryServiceInterface;
use App\Modules\Categories\Services\Interfaces\DeleteCategoryServiceInterface;

class CategoryController extends Controller
{
    private CreateCategoryServiceInterface $createCategoryServiceInterface;
    private FindAllCategoriesServiceInterface $findAllCategoriesServiceInterface;
    private FindOneCategoryServiceInterface $findOneCategoryServiceInterface;
    private UpdateCategoryServiceInterface $updateCategoryServiceInterface;
    private DeleteCategoryServiceInterface $deleteCategoryServiceInterface;

    public function __construct(
        CreateCategoryServiceInterface $createCategoryServiceInterface, 
        FindAllCategoriesServiceInterface $findAllCategoriesServiceInterface,
        FindOneCategoryServiceInterface $findOneCategoryServiceInterface,
        UpdateCategoryServiceInterface $updateCategoryServiceInterface,
        DeleteCategoryServiceInterface $deleteCategoryServiceInterface,
    ) {
        $this->createCategoryServiceInterface = $createCategoryServiceInterface;
        $this->findAllCategoriesServiceInterface = $findAllCategoriesServiceInterface;
        $this->findOneCategoryServiceInterface = $findOneCategoryServiceInterface;
        $this->updateCategoryServiceInterface = $updateCategoryServiceInterface;
        $this->deleteCategoryServiceInterface = $deleteCategoryServiceInterface;
    }

    public function create(CreateCategoryRequest $request)
    {
        try {
            $category = $this->createCategoryServiceInterface->execute($request);
            return response()->json($category, 201);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode() ?? 500);
        }
    }

    public function findAll()
    {
        try {
            $categories = $this->findAllCategoriesServiceInterface->execute();
            return response()->json($categories, 200);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode() ?? 500);
        }
    }

    public function findOne(String $id)
    {
        try {
            $category = $this->findOneCategoryServiceInterface->execute($id);
            return response()->json($category, 200);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode() ?? 500);
        }
    }

    public function update(String $id, UpdateCategoryRequest $request)
    {
        try {
            $this->updateCategoryServiceInterface->execute($id, $request);
            return response()->json([], 204);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode() ?? 500);
        }
    }

    public function destroy(String $id)
    {
        try {
            $this->deleteCategoryServiceInterface->execute($id);
            return response()->json([], 204);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode() ?? 500);
        }
    }
}
