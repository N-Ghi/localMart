<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Provider Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Provider Register</h1>
        <form action="{{route('storeProvider')}}" method="POST" class="mx-auto p-4 shadow-lg rounded" style="max-width: 500px; background-color: #f9f9f9;">
            @csrf
            <div class="form-group">
                <label for="name">Business Name</label>
                <input name="name" class="form-control" type="text" value="{{old('name')}}">
                <p class="text-danger small mt-1">{{ $errors->first('name') }}</p>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input name="email" class="form-control" type="email" value="{{old('email')}}">
                <p class="text-danger small mt-1">{{ $errors->first('email') }}</p>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input name="password" class="form-control" type="password">
                <p class="text-danger small mt-1">{{ $errors->first('password') }}</p>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input name="password_confirmation" class="form-control" type="password">
                <p class="text-danger small mt-1">{{ $errors->first('password_confirmation') }}</p>
            </div>
            <button class="btn btn-primary btn-block mt-3">Register</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
