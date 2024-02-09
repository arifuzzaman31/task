<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel
{
    /**
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Product([
            'name' => $row[0],
            'price' => floatval($row[1]),
            'category_id' => (int)$row[2], //put here cat id
            'quantity' => (int)$row[3],
            'status' => 1
        ]);
    }
}