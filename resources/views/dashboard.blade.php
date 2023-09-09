<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h1>View Dashboard Admin</h1>
    <form action="/logout" method="POST">
        @csrf
        <button type="submit" class="btn btn-success">Logout</button>
    </form>
    <br>
    <a href="/">Go to Welcome</a>
    <br>
    <br>
    <div class="container">
        <a class="btn btn-primary" href="/createbook">Tambah Data Buku</a>
        <br>
        <br>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Kode Buku</th>
                    <th scope="col">Nama Buku</th>
                    <th scope="col">Deskripsi Singkat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $data->book_code }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->description }}</td>
                        <td class="actions-column">
                            <div class="d-flex">
                                <a class="btn btn-warning" style="margin-right: 15px" href="">Edit</a>
                                <form action="/delete-book/{{ $data->id }}" method="POST">
                                    @csrf
                                    <button class="btn btn-danger" type="submit">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>
