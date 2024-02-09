<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    protected $categories;
    public function __construct(Category $category)
    {
        $this->categories = $category;
    }

    public function getAll($perPage = 10)
    {
        return $this->categories->paginate($perPage);
    }

    public function makeData($data)
    {
        return [
            "category_name" => $data["category_name"],
            "status" => $data["status"] ?? 1
        ];
    }
    public function createCategory($data)
    {
        return $this->categories->all();
    }
}