@extends('layout.master')
@section('title', 'Halaman Detail Buku')

@section('content')
<div class="row pt-4">
    <div class="col">
        <h2>Profil Buku {{$buku->nama}}</h2>
        <table class="table table-striped">
            <tr>
                <td>Kode Buku</td>
                <td>{{$buku->id}}</td>
            </tr>
            <tr>
                <td>Judul Buku</td>
                <td>{{$buku->judul}}</td>
            </tr>
            <tr>
                <td>Nama Penerbit</td>
                <td>{{$buku->penerbit}}</td>
            </tr>
            <tr>
                <td>Nama Pengarang</td>
                <td>{{$buku->pengarang}}</td>
            </tr>
            <tr>
                <td>Tahun Terbit</td>
                <td>{{$buku->tahun}}</td>
            </tr>
        </table>
    </div>
</div>
@endsection
