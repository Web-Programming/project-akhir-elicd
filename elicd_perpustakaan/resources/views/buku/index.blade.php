@extends('layout.master')
@section('title', 'Halaman List Buku')

@section('content')

<div class="row pt-4">
    <div class="col">
        <h2>Buku</h2>
        <div class="d-md-flex justify-content-md-end">
        <a href="{{route('buku.create')}}" class="btn btn-primary">Tambah</a>
        </div>

        @if (session()->has('info'))
            <div class="alert alert-succes">
                {{session()->get('info')}}
            </div>
        @endif

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Nama Buku</th><th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bukus as $item)
                    <tr>
                        <td>{{$item->judul}}</td>
                        <td>
                            <form action="{{route('buku.destroy', ['buku' =>$item->id])}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <a href="{{url('buku/'.$item->id)}}" class="btn btn-warning">Detail</a>
                                <a href="{{url('buku/'.$item->id.'/edit')}}" class="btn btn-info">Ubah</a>
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
