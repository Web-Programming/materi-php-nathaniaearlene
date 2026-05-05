<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supplier = [
            ['id' => 1, 'name' => 'Supplier A', 'address' => 'Jl. Merdeka No. 1'],
            ['id' => 2, 'name' => 'Supplier B', 'address' => 'Jl. Sudirman No. 2'],
            ['id' => 3, 'name' => 'Supplier C', 'address' => 'Jl. Thamrin No. 3'],
            ['id' => 4, 'name' => 'Supplier D', 'address' => 'Jl. Gatot Subroto No. 4']
        ];

        $title = 'Daftar Supplier';

        return view('supplier.index', compact('title', 'supplier'));
        // return view('supplier.index', [
        //     'supplier' => $supplier,
        //     'title' => $title
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('supplier.create');
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
        //
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