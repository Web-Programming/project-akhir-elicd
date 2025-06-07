<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Pinjaman</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
</head>
<body>
    <div class="container">
        <div class="row pt-4">
            <div class="col">
                <h2>Form Pinjaman</h2>
                @if (session()->has('info'))
                <div class="alert alert-success">
                    {{session()->get('info')}}
                </div>
                @endif

                <form action="{{url('pinjaman/store')}}" method="post"  enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="judul">Judul Buku</label>
                        <select name="judul" class="form-control">
                            <option value="">--Pilih--</option>
                            @foreach ($buku as $item)
                                <option value="{{$item->id}}">{{$item->judul}}</option>
                            @endforeach
                        </select>

                        <label for="tanggal_pinjam">Tanggal Pinjam</label>
                        <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control" value="{{old('tanggal_pinjam')}}">

                        <label for="anggota_id">Nama Anggota</label>
                        <select name="anggota_id" class="form-control">
                            <option value="">--Pilih--</option>
                            @foreach ($anggota as $item)
                                <option value="{{$item->id}}">{{$item->nama}}</option>
                            @endforeach
                        </select>

                        <label for="buku_id">ID Buku</label>
                        <select name="buku_id" class="form-control">
                            <option value="">--Pilih--</option>
                            @foreach ($buku as $item)
                                <option value="{{$item->id}}">{{$item->id}}</option>
                            @endforeach
                        </select>

                        <label for="pustakawan_id">ID Pustakawan</label>
                        <select name="pustakawan_id" class="form-control">
                            <option value="">--Pilih--</option>
                            @foreach ($pustakawan as $item)
                                <option value="{{$item->id}}">{{$item->id}}</option>
                            @endforeach
                        </select>

                        @error('judul')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
