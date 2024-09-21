<?php

namespace App\Repositories\Product\Interfaces;

interface ProductRepositoryInterface
{
    /**
     * Get all Product records.
     */
    public function getAll();

    /**
     * Create a new Product record.
     * 
     * @param array $data
     */
    public function create(array $data);

    /**
     * Find a record Product by ID.
     * 
     * @param int $id
     */
    public function findById(int $id);

    /**
     * Update a record Product by ID.
     * 
     * @param int $id
     * @param array $data
     */
    public function updateById(int $id, array $data);

    /**
     * Delete a record Product by ID.
     * 
     * @param int $id
     */
    public function deleteById(int $id);
}