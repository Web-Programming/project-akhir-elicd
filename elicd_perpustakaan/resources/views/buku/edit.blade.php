@extends('layout.master')
@section('title', 'Halaman Edit Buku')

@section('content')
<div class="row pt-4">
    <div class="col">
        <h2>Form Edit Buku</h2>
        @if (session()->has('info'))
        <div class="alert alert-succes">
            {{session()->get('info')}}
        </div>
        @endif
        <form action="{{route('buku.update',['buku' => $buku->id])}}" method="post">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" name="judul" id="judul" class="form-control" value="{{old('judul') ?? $buku->judul}}">
                @error('judul')
                    <div class="text-danger"> {{$message}}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-2">Ubah</button>
        </form>
    </div>
</div>
@endsection
