<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Local Experience Marketplace</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
    
    <!-- Font Awesome Icons -->
    <script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js" integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0" crossorigin="anonymous"></script>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet" />

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Source Sans Pro', sans-serif;
        }
        header, footer {
            background-color: #343a40;
            color: white;
            padding: 1rem;
        }
        h1, h2 {
            color: #007bff;
        }
        .btn-primary {
            margin-top: 10px;
        }
        footer a {
            color: #6c757d;
            text-decoration: none;
        }
    </style>
</head>
<body>
    {{-- <header class="text-center mb-4">
        <h4 class="font-weight-normal"><a href="/" class="text-white">{{config('app.name')}}</a></h4>
        <form action="/login" method="POST" class="d-flex justify-content-center mt-2">
            @csrf
            <div class="form-group mr-2">
                <input name="loginusername" class="form-control form-control-sm input-dark" type="text" placeholder="Username" autocomplete="off" />
                @error('loginusername')
                    <p class="m-0 small text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group mr-2">
                <input name="loginpassword" class="form-control form-control-sm input-dark" type="password" placeholder="Password" />
                @error('loginpassword')
                    <p class="m-0 small text-danger">{{$message}}</p>
                @enderror
            </div>
            <button class="btn btn-primary btn-sm">Sign In</button>
        </form>
    </header> --}}

    {{ $slot }}

    <footer class="border-top text-center small text-muted py-3">
        <p class="m-0">&copy; {{date('Y')}} <a href="/" class="text-muted">{{config('app.name')}}</a>. All rights reserved.</p>
    </footer>    

    <!-- JavaScript: jQuery, Popper.js, Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    <!-- Custom JS -->
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });
    </script>
</body>
</html>
