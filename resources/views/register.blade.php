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
    @if ($errors->has('name'))
        <div class="alert alert-danger">
            {{ $errors->first('name') }}
        </div>
    @elseif ($errors->has('email'))
        <div class="alert alert-danger">
            {{ $errors->first('email') }}
        </div>
    @elseif ($errors->has('password'))
        <div class="alert alert-danger">
            {{ $errors->first('password') }}
        </div>
    @endif

    <div
        style="width: 35%; background-color: rgb(255, 233, 233); padding: 20px; border-radius:15px;margin: auto; margin-top: 7%">
        <h1 style="text-align: center">Register Client Page</h1>
        <form action="/save-register" method="POST">
            @csrf
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input name="name" type="text" value="{{ old('name') }}" class="form-control" id="name"
                placeholder="Enter your full name" required>
            <br>
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input name="email" type="email" value="{{ old('email') }}" class="form-control" id="email"
                placeholder="name@example.com" required>
            <br>
            <label for="exampleFormControlInput1" class="form-label">Password</label>
            <input name="password" type="password" class="form-control" id="password" placeholder="Enter your password"
                required>
            <br>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-success">Register</button>
            </div>
        </form>
    </div>
    <br>
    <div style="text-align: center;">
        <a href="/">Go to Welcome</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>
