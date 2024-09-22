<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\StoreCategoryRequest;
use App\Models\Category;
use App\Services\Category\CategoryService;
use App\Services\Product\ProductService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoryController extends Controller
{
    protected $CategoryService, $ProductService;

    public function __construct(CategoryService $categoryService, ProductService $productService)
    {
        $this->CategoryService = $categoryService;
        $this->ProductService = $productService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = $this->CategoryService->getAll();

        return Inertia::render('Categories/Index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Categories/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $storeCategoryRequest)
    {
        $validatedData = $storeCategoryRequest->validated();

        $this->CategoryService->create($validatedData);

        return redirect()->route('categories.index')->with('message', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return Inertia::render('Categories/Edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCategoryRequest $storeCategoryRequest, Category $category)
    {
        $validatedData = $storeCategoryRequest->validated();

        $this->CategoryService->updateById($category->id, $validatedData);

        return redirect()->route('categories.index')->with('message', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $this->CategoryService->deleteById($category->id);

        return redirect()->route('categories.index')->with('message', 'Category deleted successfully.');
    }
}
