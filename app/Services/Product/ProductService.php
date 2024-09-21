<?php

namespace App\Services\Product;

use App\Repositories\Product\Interfaces\ProductRepositoryInterface;

class ProductService
{
    protected $ProductRepository;

    public function __construct(ProductRepositoryInterface $ProductRepository)
    {
        $this->ProductRepository = $ProductRepository;
    }

    /**
     * Get all Product records.
     */
    public function getAll()
    {
        return $this->ProductRepository->getAll();
    }

    /**
     * Create a new Product.
     * 
     * @param array $data
     */
    public function create(array $data)
    {
        return $this->ProductRepository->create($data);
    }

    /**
     * Find a Product by ID.
     * 
     * @param int $id
     */
    public function findById(int $id)
    {
        return $this->ProductRepository->findById($id);
    }

    /**
     * Update a Product by ID.
     * 
     * @param int $id
     * @param array $data
     */
    public function updateById(int $id, array $data)
    {
        return $this->ProductRepository->updateById($id, $data);
    }

    /**
     * Delete a Product by ID.
     * 
     * @param int $id
     */
    public function deleteById(int $id)
    {
        return $this->ProductRepository->deleteById($id);
    }
}