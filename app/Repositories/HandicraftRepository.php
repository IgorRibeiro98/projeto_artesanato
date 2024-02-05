<?php

namespace App\Repositories;

use App\Models\Handicraft;

class HandicraftRepository
{
    public function __construct(private Handicraft $handicraft)
    {
    }

    public function all()
    {
        return $this->handicraft->all();
    }

    public function create(array $data)
    {
        return $this->handicraft->create($data);
    }

    public function find(int $id)
    {
        return $this->handicraft->find($id);
    }

    public function update(array $data, int $id)
    {
        $handicraft = $this->handicraft->find($id);
        return  $handicraft->update($data);
    }

    public function delete(int $id)
    {
        $handicraft = $this->handicraft->find($id);
        return $handicraft->destroy($id);
    }
}
