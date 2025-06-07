@extends('layout.master')
@section('title', 'Halaman Detail Anggota')

@section('content')
<div class="row pt-4">
    <div class="col">
        <h2>Profil Anggota {{$anggota->nama}}</h2>
        <table class="table table-striped">
            <tr>
                <td>ID Anggota</td>
                <td>{{$anggota->id}}</td>
            </tr>
            <tr>
                <td>Nama Anggota</td>
                <td>{{$anggota->nama}}</td>
            </tr>
            <tr>
                <td>Alamat Anggota</td>
                <td>{{$anggota->alamat}}</td>
            </tr>
        </table>
    </div>
</div>
@endsection
