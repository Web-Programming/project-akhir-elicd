<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Buku</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
</head>
<body>
    <div class="container">
        <div class="row pt-4">
            <div class="col">
                <h2>Form Buku</h2>
                @if (session()->has('info'))
                <div class="alert alert-success">
                    {{session()->get('info')}}
                </div>
                @endif

                <form action="{{url('buku/store')}}" method="post"  enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" name="judul" id="judul" class="form-control" value="{{old('judul')}}">
                        <label for="pengarang">Pengarang</label>
                        <input type="text" name="pengarang" id="pengarang" class="form-control" value="{{old('pengarang')}}">
                        <label for="penerbit">Penerbit</label>
                        <input type="text" name="penerbit" id="penerbit" class="form-control" value="{{old('penerbit')}}">
                        <label for="tahun">Tahun</label>
                        <input type="date" name="tahun" id="tahun" class="form-control" value="{{old('tahun')}}">
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
