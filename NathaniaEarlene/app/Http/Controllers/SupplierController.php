<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $supplier = [
        //     ['id' => 1, 'name' => 'Supplier A', 'address' => 'Jl. Merdeka No. 1'],
        //     ['id' => 2, 'name' => 'Supplier B', 'address' => 'Jl. Sudirman No. 2'],
        //     ['id' => 3, 'name' => 'Supplier C', 'address' => 'Jl. Thamrin No. 3'],
        //     ['id' => 4, 'name' => 'Supplier D', 'address' => 'Jl. Gatot Subroto No. 4']
        // ];

        $title = 'Daftar Supplier';
        // $suppliers = DB::table('suppliers')->get();
        $suppliers = Supplier::paginate(10); //cara 4 pagination

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
        $title = 'Tambah Supplier';
        return view('supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'contact_number' => 'required|number|max:20',
            'address' => 'required|string|max:100',
        ]); // validasi input
        Supplier::create($validated); // simpan ke DB
        return redirect()->route('supplier.index')
        ->with('success', 'Supplier berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = 'Detail Supplier';
        $supplier = Supplier::findOrFail($id); // 404 otomatis jika tidak ditemukan
        return view('supplier.detail', compact('supplier', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "Edit Supplier";
        $supplier = Supplier::findOrFail($id);
        return view('supplier.edit', compact('supplier', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $supplier = Supplier::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'contact_number' => 'required|number|max:20',
            'address' => 'required|string|max:100',
        ]);
        $supplier->update($validated);
        return redirect()->route('supplier.index')
            ->with('success', 'Supplier berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
        return redirect()->route('supplier.index')
            ->with('success', 'Supplier berhasil dihapus.');
    }
}