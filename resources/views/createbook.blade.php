<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Data Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    @if ($errors->has('name'))
        <div class="alert alert-danger">
            {{ $errors->first('name') }}
        </div>
    @elseif ($errors->has('book_code'))
        <div class="alert alert-danger">
            {{ $errors->first('book_code') }}
        </div>
    @elseif ($errors->has('description'))
        <div class="alert alert-danger">
            {{ $errors->first('description') }}
        </div>
    @endif
    <h1>Tambah Data Buku</h1>
    <br>
    <div class="container">
        <div class="col-4">
            <form action="/store-book" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Kode Buku</label>
                    <input type="text" value="{{ old('book_code') }}" name="book_code" class="form-control"
                        id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama Buku</label>
                    <input type="text" value="{{ old('name') }}" name="name" class="form-control"
                        id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Deskripsi Singkat</label>
                    <input type="text" value="{{ old('description') }}" name="description" class="form-control"
                        id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>
                <button type="submit" class="btn btn-primary">simpan</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>
