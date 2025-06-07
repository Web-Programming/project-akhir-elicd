@extends('layout.master')
@section('title', 'Halaman Detail Pustakawan')

@section('content')
<div class="row pt-4">
    <div class="col">
        <h2>Profil Pustakawan {{$pustakawan->nama}}</h2>
        <table class="table table-striped">
            <tr>
                <td>ID Anggota</td>
                <td>{{$pustakawan->id}}</td>
            </tr>
            <tr>
                <td>Nama Anggota</td>
                <td>{{$pustakawan->nama}}</td>
            </tr>
        </table>
    </div>
</div>
@endsection
