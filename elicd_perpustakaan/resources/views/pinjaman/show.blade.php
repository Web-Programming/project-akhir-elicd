@extends('layout.master')
@section('title', 'Halaman Detail Pinjaman')

@section('content')
<div class="row pt-4">
    <div class="col">
        {{-- <h2>Data Pinjaman {{$pinjaman->judul}}</h2> --}}
        <h2>Data Pinjaman {{$pinjaman->judul}}</h2>
        <table class="table table-striped">
            <tr>
                <td>Kode Buku</td>
                <td>{{$pinjaman->id}}</td>
            </tr>
            <tr>
                <td>Judul Buku</td>
                <td>{{$pinjaman->buku->judul}}</td>
            </tr>
            <tr>
                <td>Tanggal Pinjam</td>
                <td>{{$pinjaman->tanggal_pinjam}}</td>
            </tr>
            <tr>
                <td>Kode Anggota</td>
                <td>{{$pinjaman->anggota_id}}</td>
            </tr>
            <tr>
                <td>Kode buku</td>
                <td>{{$pinjaman->buku_id}}</td>
            </tr>
            <tr>
                <td>Kode Pustakawan</td>
                <td>{{$pinjaman->pustakawan_id}}</td>
            </tr>
        </table>
    </div>
</div>
@endsection
