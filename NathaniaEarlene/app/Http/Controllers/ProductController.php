<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;

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
        return view('produk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = 'Detail Produk';
        $product = ['id' => 4, 'name' => 'Monitor', 'price' => 2000000];
        return view('produk.detail', compact('id', 'product', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}