<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\StoreProductRequest;
use App\Models\Product;
use App\Services\Product\ProductService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    protected $ProductService;

    public function __construct(ProductService $productService)
    {
        $this->ProductService = $productService;
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
        return Inertia::render('Products/Create');
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
        return Inertia::render('Products/Edit', ['product' => $product]);
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
