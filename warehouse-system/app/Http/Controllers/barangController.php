<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $barangs = Barang::orderBy('id_barang')->get();
        return view('barang.index', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'id_barang' => 'required|string|max:255|unique:barangs,id_barang',
            'nama_barang' => 'required|string|max:150',
            'harga_beli' => 'required|numeric|min:0',
            'harga_jual' => 'required|numeric|min:0',
            'satuan_barang' => 'required|string|max:50',
            'stok' => 'required|integer|min:0'
        ]);

        try {
            Barang::create($request->all());
            return redirect()->route('barang.index')->with('success', 'Data barang berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan data barang: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $barang = Barang::findOrFail($id);
        return view('barang.show', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $barang = Barang::findOrFail($id);
        return view('barang.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $barang = Barang::findOrFail($id);

        $request->validate([
            'id_barang' => 'required|string|max:255|unique:barangs,id_barang,' . $id . ',id_barang',
            'nama_barang' => 'required|string|max:150',
            'harga_beli' => 'required|numeric|min:0',
            'harga_jual' => 'required|numeric|min:0',
            'satuan_barang' => 'required|string|max:50',
            'stok' => 'required|integer|min:0'
        ]);

        try {
            $barang->update($request->all());
            return redirect()->route('barang.index')->with('success', 'Data barang berhasil diubah');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mengubah data barang: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        try {
            $barang = Barang::findOrFail($id);
            
            // Cek apakah barang masih digunakan dalam transaksi
            if ($barang->transaksis()->count() > 0) {
                return redirect()->back()->with('error', 'Tidak dapat menghapus barang yang masih digunakan dalam transaksi');
            }

            $barang->delete();
            return redirect()->route('barang.index')->with('success', 'Data barang berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus data barang: ' . $e->getMessage());
        }
    }
}