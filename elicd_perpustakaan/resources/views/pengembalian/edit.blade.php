@extends('layout.master')
@section('title', 'Halaman Edit Pengembalian')

@section('content')
<div class="row pt-4">
    <div class="col">
        <h2>Form Edit Pengembalian</h2>
        @if (session()->has('info'))
        <div class="alert alert-succes">
            {{session()->get('info')}}
        </div>
        @endif
        <form action="{{route('pengembalian.update',['pengembalian' => $pengembalian->id])}}" method="post">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" name="judul" id="judul" class="form-control" value="{{old('judul') ?? $pengembalian->judul}}">
                <label for="tanggal_kembali">Tanggal Pengembalian</label>
                <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="form-control" value="{{old('tanggal_kembali') ?? $pengembalian->tanggal_kembali}}">
                @error('judul')
                    <div class="text-danger"> {{$message}}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-2">Ubah</button>
        </form>
    </div>
</div>
@endsection
