<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\Category\Interfaces\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    /**
     * Get all Category records.
     */
    public function getAll()
    {
        return Category::all();
    }

    /**
     * Create a new Category record.
     * 
     * @param array $data
     */
    public function create(array $data)
    {
        return Category::create($data);
    }

    /**
     * Find a record Category by ID.
     * 
     * @param int $id
     */
    public function findById(int $id)
    {
        return Category::findOrFail($id);
    }

    /**
     * Update a record Category by ID.
     * 
     * @param int $id
     * @param array $data
     */
    public function updateById(int $id, array $data)
    {
        $model = Category::findOrFail($id);
        $model->update($data);

        return $model;
    }

    /**
     * Delete a record Category by ID.
     * 
     * @param int $id
     */
    public function deleteById(int $id)
    {
        $model = Category::findOrFail($id);
        return $model->delete();
    }
}