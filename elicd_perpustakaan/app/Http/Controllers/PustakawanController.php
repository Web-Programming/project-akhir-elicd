<?php

namespace App\Http\Controllers;

use App\Models\Pustakawan;
use Illuminate\Http\Request;

class PustakawanController extends Controller
{
    //
    public function index(){
        $pustakawans = Pustakawan::all();
        return view('pustakawan.index')->with('pustakawans', $pustakawans);
    }

    public function create(){
        return view('pustakawan.create');
    }

    public function store(Request $request){
        $this->authorize('create', Pustakawan::class);

        $validateData = $request->validate([
           'nama' => 'required|min:5|max:20'
        ]);
        $pustakawan = new Pustakawan();
        $pustakawan->nama=$validateData['nama'];
        $pustakawan->save();

        $request->session()->flash('info', "Data Pustakawan $pustakawan->nama berhasil disimpan ke database");
        return redirect()->route('pustakawan.create');
    }

    public function  show(Pustakawan $pustakawan){
        return view('pustakawan.show', ['pustakawan' => $pustakawan]);
    }

    public function edit(Pustakawan $pustakawan){
        return view('pustakawan.edit', ['pustakawan' => $pustakawan]);
    }

    public function update(Request $request, Pustakawan $pustakawan){
        $validateData = $request->validate([
            'nama' => 'required|min:5|max:20'
        ]);
        Pustakawan::where('id', $pustakawan->id)->update($validateData);
        $request->session()->flash('info', "Data pustakawan $pustakawan->nama berhasil diubah");
        return redirect()->route('pustakawan.index');
    }

    public function destroy(Pustakawan $pustakawan){
        $this->authorize('delete', $pustakawan);

        $pustakawan->delete();
        return redirect()->route('pustakawan.index')->with("info", "Buku $pustakawan->nama berhasil dihapus");
    }

    public function __construct(){
        $this->middleware('auth')->except('create');
    }

}

