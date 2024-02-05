<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\HandicraftRepository;

class HandicraftController extends Controller
{

    public function __construct(private HandicraftRepository $handicraftRepository)
    {
    }

    public function index()
    {
        return $this->handicraftRepository->all();
    }

    public function store(Request $request)
    {
        return $this->handicraftRepository->create($request->all());
    }

    public function show(int $id)
    {
        return $this->handicraftRepository->find($id);
    }

    public function update(Request $request, int $id)
    {
        return $this->handicraftRepository->update($request->all(), $id);
    }

    public function destroy(int $id)
    {
        return $this->handicraftRepository->delete($id);
    }
}
