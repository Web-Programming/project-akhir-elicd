<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    //
    public function index(){
        $bukus = Buku::all();
        return view('buku.index')->with('bukus', $bukus);
    }

    public function create(){
        return view('buku.create');
    }

    public function store(Request $request){
        $this->authorize('create', Buku::class);

        $validateData = $request->validate([
           'judul' => 'required|min:5|max:100',
           'pengarang' => 'required|min:5|max:100',
           'penerbit' => 'required|min:5|max:100',
           'tahun' => 'required'

        ]);
        $buku = new Buku();
        $buku->judul=$validateData['judul'];
        $buku->pengarang=$validateData['penerbit'];
        $buku->penerbit=$validateData['penerbit'];
        $buku->tahun=$validateData['tahun'];

        $buku->save();

        $request->session()->flash('info', "Data Buku $buku->judul berhasil disimpan ke database");
        return redirect()->route('buku.create');
    }

    public function  show(Buku $buku){
        return view('buku.show', ['buku' => $buku]);
    }

    public function edit(Buku $buku){
        return view('buku.edit', ['buku' => $buku]);
    }

    public function update(Request $request, Buku $buku){
        $validateData = $request->validate([
            'judul' => 'required|min:5|max:100'
        ]);
        Buku::where('id', $buku->id)->update($validateData);
        $request->session()->flash('info', "Data buku $buku->judul berhasil diubah");
        return redirect()->route('buku.index');
    }

    public function destroy(Buku $buku){
        $this->authorize('delete', $buku);

        $buku->delete();
        return redirect()->route('buku.index')->with("info", "Buku $buku->judul berhasil dihapus");

    }

    public function __construct(){
        $this->middleware('auth')->except('create');
    }

}

