<?php

namespace App\Http\Controllers;

use App\Models\InfoPelanggan;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class InfoPelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $pelanggans = InfoPelanggan::orderBy('id_pelanggan')->get();
        return view('pelanggan.index', compact('pelanggans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'id_pelanggan' => 'required|string|max:255|unique:info_pelanggans,id_pelanggan',
            'nama_pelanggan' => 'required|string|max:150',
            'alamat' => 'required|string',
            'no_telp' => 'required|string|max:20'
        ]);

        try {
            InfoPelanggan::create($request->all());
            return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan data pelanggan: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $pelanggan = InfoPelanggan::findOrFail($id);
        return view('pelanggan.show', compact('pelanggan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $pelanggan = InfoPelanggan::findOrFail($id);
        return view('pelanggan.edit', compact('pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $pelanggan = InfoPelanggan::findOrFail($id);

        $request->validate([
            'id_pelanggan' => 'required|string|max:255|unique:info_pelanggans,id_pelanggan,' . $id . ',id_pelanggan',
            'nama_pelanggan' => 'required|string|max:150',
            'alamat' => 'required|string',
            'no_telp' => 'required|string|max:20'
        ]);

        try {
            $pelanggan->update($request->all());
            return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil diubah');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mengubah data pelanggan: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        try {
            $pelanggan = InfoPelanggan::findOrFail($id);
            
            // Cek apakah pelanggan masih digunakan dalam transaksi
            if ($pelanggan->transaksis()->count() > 0) {
                return redirect()->back()->with('error', 'Tidak dapat menghapus pelanggan yang masih memiliki transaksi');
            }

            $pelanggan->delete();
            return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus data pelanggan: ' . $e->getMessage());
        }
    }
}