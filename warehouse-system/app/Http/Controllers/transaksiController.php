<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use App\Models\Barang;
use App\Models\InfoPelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with(['pelanggan', 'barang'])
            ->orderBy('id_transaksi')
            ->get();
        return view('transaksi.index', compact('transaksis'));
    }

    public function create()
    {
        $barangs = Barang::available()->get();
        $pelanggans = InfoPelanggan::all();
        return view('transaksi.create', compact('barangs', 'pelanggans'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_transaksi' => 'required|string|max:255|unique:transaksis,id_transaksi',
            'tanggal_transaksi' => 'required|date',
            'id_pelanggan' => 'required|exists:info_pelanggans,id_pelanggan',
            'id_barang' => 'required|exists:barangs,id_barang',
            'jumlah' => 'required|integer|min:1'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            Transaksi::createWithStockUpdate($request->all());
            return redirect()->route('transaksi.index')
                ->with('success', 'Transaksi berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', $e->getMessage())
                ->withInput();
        }
    }

    public function show($id)
    {
        $transaksi = Transaksi::with(['pelanggan', 'barang'])->findOrFail($id);
        return view('transaksi.show', compact('transaksi'));
    }

    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $barangs = Barang::all();
        $pelanggans = InfoPelanggan::all();
        return view('transaksi.edit', compact('transaksi', 'barangs', 'pelanggans'));
    }

    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        
        $validator = Validator::make($request->all(), [
            'id_transaksi' => 'required|string|max:255|unique:transaksis,id_transaksi,' . $id . ',id_transaksi',
            'tanggal_transaksi' => 'required|date',
            'id_pelanggan' => 'required|exists:info_pelanggans,id_pelanggan',
            'id_barang' => 'required|exists:barangs,id_barang',
            'jumlah' => 'required|integer|min:1'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $transaksi->updateWithStockAdjustment($request->all());
            return redirect()->route('transaksi.index')
                ->with('success', 'Transaksi berhasil diubah');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', $e->getMessage())
                ->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $transaksi = Transaksi::findOrFail($id);
            $transaksi->deleteWithStockRestore();
            
            return redirect()->route('transaksi.index')
                ->with('success', 'Transaksi berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('transaksi.index')
                ->with('error', 'Gagal menghapus transaksi: ' . $e->getMessage());
        }
    }
}