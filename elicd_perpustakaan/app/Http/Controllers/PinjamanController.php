<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Pinjaman;
use App\Models\Pustakawan;
use Illuminate\Http\Request;

class PinjamanController extends Controller
{
    //
    public function index(){
        $pinjamans = Pinjaman::all();
        return view('pinjaman.index')->with('pinjamans', $pinjamans);
    }

    public function create(){
        $anggota = Anggota::all();
        $buku = Buku::all();
        $pustakawan = Pustakawan::all();
        return view('pinjaman.create', compact('anggota', 'buku', 'pustakawan'));
       }

    public function store(Request $request){
        $this->authorize('create', Pinjaman::class);

        $validateData = $request->validate([
           'judul' => 'required',
           'tanggal_pinjam' => 'required',
           'anggota_id' => 'required',
           'buku_id' => 'required',
           'pustakawan_id' => 'required'
        ]);
        $pinjaman = new Pinjaman();
        $pinjaman->judul=$validateData['judul'];
        $pinjaman->tanggal_pinjam=$validateData['tanggal_pinjam'];
        $pinjaman->anggota_id=$validateData['anggota_id'];
        $pinjaman->buku_id=$validateData['buku_id'];
        $pinjaman->pustakawan_id=$validateData['pustakawan_id'];
        $pinjaman->save();

        $request->session()->flash('info', "Data Pinjaman berhasil disimpan ke database");
        return redirect()->route('pinjaman.create');
    }

    public function  show(Pinjaman $pinjaman){
        return view('pinjaman.show', ['pinjaman' => $pinjaman]);
    }

    public function edit(Pinjaman $pinjaman){
        return view('pinjaman.edit', ['pinjaman' => $pinjaman]);
    }

    public function update(Request $request, Pinjaman $pinjaman){
        $validateData = $request->validate([
            'judul' => 'required',
            'tanggal_pinjam' => 'required',
            'anggota_id' => 'required',
            'buku_id' => 'required',
            'pustakawan_id' => 'required'
        ]);
        Pinjaman::where('id', $pinjaman->id)->update($validateData);
        $request->session()->flash('info', "Data pinjaman $pinjaman->judul berhasil diubah");
        return redirect()->route('pinjaman.index');
    }

    public function destroy(Pinjaman $pinjaman){
        $this->authorize('delete', $pinjaman);

        $pinjaman->delete();
        return redirect()->route('pinjaman.index')->with("info", "Pinjaman berhasil dihapus");
    }

    public function __construct(){
        $this->middleware('auth')->except('create');
    }

}

