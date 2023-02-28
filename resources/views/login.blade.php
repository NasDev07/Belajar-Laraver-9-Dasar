<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 9 | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<style>
    .login-box {
        border: solid 1px;
        border-radius: 5px;
        width: 400px;
        padding: 10px;
        box-sizing: border-box;
        color: dodgerblue;
    }
</style>

<body>

    <div class="vh-100 d-flex justify-content-center align-items-center flex-column">
        <div class="login-box">
            {{-- notifikasi --}}
            @if (Session::has('status'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('message') }}
                </div>
            @endif

            <form action="" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="email">Email</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="Input Email"
                        required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password"
                        placeholder="Input password" required>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary btn-sm form-control">Login</button>
                </div>
            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
