<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(10);
        return response()->json(
            [
                'status' => 'succes',
                'message' => 'Daftar produk berhasil diambil.',
                'data' => $products,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name'         => 'required|string|max:100',
            'price'        => 'required|numeric|min:0',
            'description'  => 'nullable|string',
            'status'       => 'required|in:new,used',
            'is_active'    => 'nullable|boolean',
            'release_date' => 'nullable|date',
        ]);

        $product = Product::create($validated);

        return response()->json(
            [
                'status' => 'success',
                'message' => 'Produk berhasil ditambahkan.',
                'data' => $product,
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $product = Product::findOrFail($id);
        if (!$product) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'Produk tidak ditemukan.',
                ],
                404
            );
        }
        return response()->json(
            [
                'status' => 'success',
                'message' => 'Produk berhasil diambil.',
                'data' => $product,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'Produk tidak ditemukan.',
                ],
                404
            );
        }

        $validated = $request->validate([
            'name'         => 'required|string|max:100',
            'price'        => 'required|numeric|min:0',
            'description'  => 'nullable|string',
            'status'       => 'required|in:new,used',
            'is_active'    => 'nullable|boolean',
            'release_date' => 'nullable|date',
        ]);

        $product->update($validated);

        return response()->json(
            [
                'status' => 'success',
                'message' => 'Produk berhasil diperbarui.',
                'data' => $product,
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'Produk tidak ditemukan.',
                ],
                404
            );
        }

        $product->delete();

        return response()->json(
            [
                'status' => 'success',
                'message' => 'Produk berhasil dihapus.',
            ]
        );
    }
}
