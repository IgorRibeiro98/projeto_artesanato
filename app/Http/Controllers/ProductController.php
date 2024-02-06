<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use Exception;
use Illuminate\Http\Request;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function __construct(private ProductRepository $productRepository)
    {
    }

    public function index()
    {
        try {
            return response()->json(ProductResource::collection($this->productRepository->all()));
        } catch (Exception $ex) {
            return response()->json($ex->getMessage(), 400);
        }
    }

    public function show(int $id)
    {
        try {
            return response()->json(new ProductResource($this->productRepository->find($id)));
        } catch (Exception $ex) {
            return response()->json($ex->getMessage(), 400);
        }
    }

    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'name' => 'required|string',
                'price' => 'required|numeric',
                'description' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg'
            ]);
            if ($request->hasFile('image')) {
                $file =  $request->file('image');
                Storage::putFileAs('products', $file, $file->getClientOriginalName());
                $data['image'] = $file->getClientOriginalName();
            }

            return response()->json($this->productRepository->create($data));
        } catch (Exception $ex) {
            return response()->json($ex->getMessage(), 400);
        }
    }

    public function update(Request $request, int $id)
    {
        try {
            $data = $request->validate([
                'name' => 'required|string',
                'price' => 'required|numeric',
                'description' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg'
            ]);
            if ($request->hasFile('image')) {
                $file =  $request->file('image');
                Storage::putFileAs('products', $file, $file->getClientOriginalName());
                $data['image'] = $file->getClientOriginalName();
            }

            return response()->json($this->productRepository->update($data, $id));
        } catch (Exception $ex) {
            return response()->json($ex->getMessage(), 400);
        }
    }

    public function destroy(int $id)
    {
        try {
            return response()->json($this->productRepository->delete($id));
        } catch (Exception $ex) {
            return response()->json($ex->getMessage(), 400);
        }
    }
}
