@extends('layout.master')
@section('title', 'Halaman Edit Pustakawan')

@section('content')
<div class="row pt-4">
    <div class="col">
        <h2>Form Edit Pustakawan</h2>
        @if (session()->has('info'))
        <div class="alert alert-succes">
            {{session()->get('info')}}
        </div>
        @endif
        <form action="{{route('pustakawan.update',['pustakawan' => $pustakawan->id])}}" method="post">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{old('judul') ?? $pustakawan->nama}}">
                @error('nama')
                    <div class="text-danger"> {{$message}}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-2">Ubah</button>
        </form>
    </div>
</div>
@endsection
