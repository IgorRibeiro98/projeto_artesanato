<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    public function __construct(private Product $product)
    {
    }

    public function all()
    {
        return $this->product->all();
    }

    public function create(array $data)
    {
        return $this->product->create($data);
    }

    public function find(int $id)
    {
        return $this->product->find($id);
    }

    public function update(array $data, int $id)
    {
        $product = $this->product->find($id);
        return  $product->update($data);
    }

    public function delete(int $id)
    {
        $product = $this->product->find($id);
        return $product->destroy($id);
    }
}
