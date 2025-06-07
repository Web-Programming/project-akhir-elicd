@extends('layout.master')
@section('title', 'Halaman Edit Pinjaman')

@section('content')
<div class="row pt-4">
    <div class="col">
        <h2>Form Edit Pinjaman</h2>
        @if (session()->has('info'))
        <div class="alert alert-succes">
            {{session()->get('info')}}
        </div>
        @endif
        <form action="{{route('pinjaman.update',['pinjaman' => $pinjaman->id])}}" method="post">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" name="judul" id="judul" class="form-control" value="{{old('judul') ?? $pinjaman->buku->judul}}">
                <label for="tanggal_pinjam">Tanggal Pinjam</label>
                <input type="text" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control" value="{{old('tanggal_pinjam') ?? $pinjaman->tanggal_pinjam}}">

                @error('judul')
                    <div class="text-danger"> {{$message}}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-2">Ubah</button>
        </form>
    </div>
</div>
@endsection
