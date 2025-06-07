@extends('layout.master')
@section('title', 'Halaman List Anggota')

@section('content')

<div class="row pt-4">
    <div class="col">
        <h2>Anggota</h2>
        <div class="d-md-flex justify-content-md-end">
        <a href="{{route('anggota.create')}}" class="btn btn-primary">Tambah</a>
        </div>

        @if (session()->has('info'))
            <div class="alert alert-succes">
                {{session()->get('info')}}
            </div>
        @endif

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Nama Anggota</th><th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($anggotas as $item)
                    <tr>
                        <td>{{$item->nama}}</td>
                        <td>
                            <form action="{{route('anggota.destroy', ['anggota' =>$item->id])}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <a href="{{url('anggota/'.$item->id)}}" class="btn btn-warning">Detail</a>
                                <a href="{{url('anggota/'.$item->id.'/edit')}}" class="btn btn-info">Ubah</a>
                                @can('delete', $item)
                                <button type="submit" class="btn btn-danger">Hapus</button>
                                @endcan
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
