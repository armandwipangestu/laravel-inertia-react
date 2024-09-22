<?php

namespace App\Repositories\Category\Interfaces;

interface CategoryRepositoryInterface
{
    /**
     * Get all Category records.
     */
    public function getAll();

    /**
     * Create a new Category record.
     * 
     * @param array $data
     */
    public function create(array $data);

    /**
     * Find a record Category by ID.
     * 
     * @param int $id
     */
    public function findById(int $id);

    /**
     * Update a record Category by ID.
     * 
     * @param int $id
     * @param array $data
     */
    public function updateById(int $id, array $data);

    /**
     * Delete a record Category by ID.
     * 
     * @param int $id
     */
    public function deleteById(int $id);
}