<?php

namespace App\Http\Controllers;

use App\Models\Product; //tambahkan manual
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Daftar Produk';


        //  $products = [
        //     ['id' => 1, 'name' => 'Laptop', 'price' => 15000000],
        //     ['id' => 2, 'name' => 'Mouse', 'price' => 5000000],
        //     ['id' => 3, 'name' => 'Keyboard', 'price' => 3000000],
        //     ['id' => 4, 'name' => 'Monitor', 'price' => 2000000]
        // ];
        //$products = Product::all();  //cara1
        // $product = DB::select('SELECT * FROM products');  //cara2
        $product = DB::table('products')->get();  //cara3


        return view('produk.index', compact('title', 'products'));
        // return view('produk.index', [
        //     'products' => $products,
        //     'title' => $title
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // cek auhtorization menggunakan Gate
        Gate::authorize('create-product');

        $title = 'Tambah Produk';
        return view('produk.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', Product::class);
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'status' => 'required|in:new,used',
            'is_active' => 'nullable|boolean',
            'release_date' => 'required|date',
        ]); // validasi input
        $validated['is_active'] = $request->has('is_active') ? 1 : 0; // tangani checkbox
        Product::create($validated); // simpan ke DB
        return redirect()->route('produk.index')
        ->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = 'Detail Produk';
        $product = Product::findOrFail($id); // 404 otomatis jika tidak ditemukan;
        return view('produk.detail', compact('id', 'product', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        Gate::authorize('update-product');
        $title = "Edit Produk";
        $product = Product::findOrFail($id);
        return view('produk.edit', compact('product', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
        Gate::authorize('update', $product);

        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'status' => 'required|in:new,used',
            'is_active' => 'nullable|boolean',
            'release_date' => 'nullable|date',
        ]);
        
        $validated['is_active'] = $request->has('is_active') ? 1 : 0;
        $product->update($validated);
        return redirect()->route('produk.index')
            ->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Gate::authorize('delete-product');
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('produk.index')
            ->with('success', 'Produk berhasil dihapus.');
    }
}