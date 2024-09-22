<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\StoreProductRequest;
use App\Models\Product;
use App\Services\Category\CategoryService;
use App\Services\Product\ProductService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    protected $ProductService, $CategoryService;

    public function __construct(ProductService $productService, CategoryService $categoryService)
    {
        $this->ProductService = $productService;
        $this->CategoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = $this->ProductService->getAll();

        return Inertia::render('Products/Index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = $this->CategoryService->getAll();

        return Inertia::render('Products/Create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $storeProductRequest)
    {
        $validatedData = $storeProductRequest->validated();

        $this->ProductService->create($validatedData);

        return redirect()->route('products.index')->with('message', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = $this->CategoryService->getAll();

        return Inertia::render('Products/Edit', ['product' => $product, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProductRequest $storeProductRequest, Product $product)
    {
        $validatedData = $storeProductRequest->validated();

        $this->ProductService->updateById($product->id, $validatedData);

        return redirect()->route('products.index')->with('message', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $this->ProductService->deleteById($product->id);
        return redirect()->route('products.index')->with('message', 'Product deleted successfully.');
    }
}
