@extends('layout.master')
@section('title', 'Halaman Detail Pengembalian')

@section('content')
<div class="row pt-4">
    <div class="col">
        <h2>Data Pengembalian {{$pengembalian->judul}}</h2>
        <table class="table table-striped">
            <tr>
                <td>Kode Buku</td>
                <td>{{$pengembalian->id}}</td>
            </tr>
            <tr>
                <td>Judul Buku</td>
                <td>{{$pengembalian->judul}}</td>
            </tr>
            <tr>
                <td>Tanggal Pengembalian</td>
                <td>{{$pengembalian->tanggal_kembali}}</td>
            </tr>
            <tr>
                <td>Kode Pinjaman</td>
                <td>{{$pengembalian->pinjamen_id}}</td>
            </tr>
            <tr>
                <td>Kode Pustakawan</td>
                <td>{{$pengembalian->pustakawan_id}}</td>
            </tr>
        </table>
    </div>
</div>
@endsection
