<?php

namespace App\Services\Category;

use App\Repositories\Category\Interfaces\CategoryRepositoryInterface;

class CategoryService
{
    protected $CategoryRepository;

    public function __construct(CategoryRepositoryInterface $CategoryRepository)
    {
        $this->CategoryRepository = $CategoryRepository;
    }

    /**
     * Get all Category records.
     */
    public function getAll()
    {
        return $this->CategoryRepository->getAll();
    }

    /**
     * Create a new Category.
     * 
     * @param array $data
     */
    public function create(array $data)
    {
        return $this->CategoryRepository->create($data);
    }

    /**
     * Find a Category by ID.
     * 
     * @param int $id
     */
    public function findById(int $id)
    {
        return $this->CategoryRepository->findById($id);
    }

    /**
     * Update a Category by ID.
     * 
     * @param int $id
     * @param array $data
     */
    public function updateById(int $id, array $data)
    {
        return $this->CategoryRepository->updateById($id, $data);
    }

    /**
     * Delete a Category by ID.
     * 
     * @param int $id
     */
    public function deleteById(int $id)
    {
        return $this->CategoryRepository->deleteById($id);
    }
}