<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    protected $products;

    public function __construct(Product $products)
    {
        $this->products = $products;
    }

    public function getAll($perPage = 10)
    {
        return $this->products->with('category')->paginate($perPage);
    }

    public function makeData($data)
    {
        return [
            "name" => $data["product_name"],
            "price" => $data["price"],
            "quantity" => $data["quantity"],
            "category_id" => $data["category"],
            "status" => $data["status"] ?? 1
        ];
    }
}