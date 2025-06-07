<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Pengembalian;
use App\Models\Pinjaman;
use App\Models\Pustakawan;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    //
    public function index(){
        $pengembalians = Pengembalian::all();
        return view('pengembalian.index')->with('pengembalians', $pengembalians);
    }

    public function create(){
        $buku = Buku::all();
        $pustakawan = Pustakawan::all();
        $pinjaman = Pinjaman::all();
        return view('pengembalian.create', compact('buku','pustakawan', 'pinjaman'));
    }

    public function store(Request $request){
        $this->authorize('create', Pengembalian::class);

        $validateData = $request->validate([
           'judul' => 'required',
           'tanggal_kembali' => 'required',
           'pinjaman_id' => 'required',
           'pustakawan_id' => 'required'
        ]);
        $pengembalian = new Pengembalian();
        $pengembalian->judul=$validateData['judul'];
        $pengembalian->tanggal_kembali=$validateData['tanggal_kembali'];
        $pengembalian->pinjaman_id=$validateData['pinjaman_id'];
        $pengembalian->pustakawan_id=$validateData['pustakawan_id'];
        $pengembalian->save();

        $request->session()->flash('info', "Data Pengembalian berhasil disimpan ke database");
        return redirect()->route('pengembalian.create');
    }

    public function  show(Pengembalian $pengembalian){
        return view('pengembalian.show', ['pengembalian' => $pengembalian]);
    }

    public function edit(Pengembalian $pengembalian){
        return view('pengembalian.edit', ['pengembalian' => $pengembalian]);
    }

    public function update(Request $request, Pengembalian $pengembalian){
        $validateData = $request->validate([
            'judul' => 'required',
            'tanggal_kembali' => 'required',
            'pinjaman_id' => 'required',
            'pustakawan_id' => 'required'
        ]);
        Pengembalian::where('id', $pengembalian->id)->update($validateData);
        $request->session()->flash('info', "Data pengembalian $pengembalian->judul berhasil diubah");
        return redirect()->route('pengembalian.index');
    }

    public function destroy(Pengembalian $pengembalian){
        $this->authorize('delete', $pengembalian);

        $pengembalian->delete();
        return redirect()->route('pengembalian.index')->with("info", "Pengembalian $pengembalian->judul berhasil dihapus");
    }

    public function __construct(){
        $this->middleware('auth')->except('create');
    }

}

