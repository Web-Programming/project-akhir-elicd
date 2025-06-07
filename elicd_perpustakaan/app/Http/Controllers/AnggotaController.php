<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    //
    public function index(){
        $anggotas = Anggota::all();
        return view('anggota.index')->with('anggotas', $anggotas);
    }

    public function create(){
        return view('anggota.create');
    }

    public function store(Request $request){
        $this->authorize('create', Anggota::class);

        $validateData = $request->validate([
           'nama' => 'required|min:5|max:20',
           'alamat' => 'required|min:5|max:100'
        ]);
        $anggota = new Anggota();
        $anggota->nama=$validateData['nama'];
        $anggota->alamat=$validateData['alamat'];
        $anggota->save();

        $request->session()->flash('info', "Data anggota $anggota->nama dan alamat $anggota->alamat berhasil disimpan ke database");
        return redirect()->route('anggota.create');
    }

    public function  show(Anggota $anggota){
        return view('anggota.show', ['anggota' => $anggota]);
    }

    public function edit(Anggota $anggota){
        return view('anggota.edit', ['anggota' => $anggota]);
    }

    public function update(Request $request, Anggota $anggota){
        $validateData = $request->validate([
            'nama' => 'required|min:5|max:20'
        ]);
        Anggota::where('id', $anggota->id)->update($validateData);
        $request->session()->flash('info', "Data anggota $anggota->nama berhasil diubah");
        return redirect()->route('anggota.index');
    }

    public function destroy(Anggota $anggota){
        $this->authorize('delete', $anggota);

        $anggota->delete();
        return redirect()->route('anggota.index')->with("info", "Anggota $anggota->nama berhasil dihapus");
    }

    public function __construct(){
        $this->middleware('auth')->except('create');
    }

}

