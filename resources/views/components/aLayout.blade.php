<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name')}}</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
    
    <!-- Font Awesome Icons -->
    <script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js" integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0" crossorigin="anonymous"></script>

    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet" />

    {{-- CSS Link --}}
    <link rel="stylesheet" href="{{asset('css/layout.css')}}">
</head>
<body>
    <header class="text-center mb-4">
        
        <div class="d-flex flex-wrap align-items-center justify-content-between my-3 my-md-0"> 
                                                    
            <div class="d-flex align-items-center">
                <h4 class="my-0 mr-md-auto font-weight-normal font-weight-normal">
                    <a href="{{ route('adminDashboard') }}" class="text-white">{{config('app.name')}}</a>
                </h4>
            
                <!-- Collapsible Service Links -->
                <button class="btn btn-info btn-sm mx-2" type="button" data-toggle="collapse" data-target="#serviceLinks" aria-expanded="false" aria-controls="serviceLinks">
                    Service Links
                </button>
                
                <div class="collapse" id="serviceLinks">
                    <div class="d-flex flex-wrap mt-3">
                        <a class="btn btn-sm btn-primary mx-2" href="{{route('createService')}}">Create Service</a>
                        <a class="btn btn-sm btn-primary mx-2" href="{{route('showServices')}}">View Services</a>
                    </div>
                </div>
                <!-- Collapsible Booking Links -->
                <button class="btn btn-info btn-sm mx-2" type="button" data-toggle="collapse" data-target="#BookingLinks" aria-expanded="false" aria-controls="BookingLinks">
                    Booking Links
                </button>
                
                <div class="collapse" id="BookingLinks">
                    <div class="d-flex flex-wrap mt-3">
                        <a class="btn btn-sm btn-primary mx-2" href="{{route('showBookings')}}">View Bookings</a>
                    </div>
                </div>
        
                <!-- Collapsible Profile Links -->
                <button class="btn btn-info btn-sm mx-2" type="button" data-toggle="collapse" data-target="#profileLinks" aria-expanded="false" aria-controls="profileLinks">
                    Profile Links
                </button>
                <div class="collapse" id="profileLinks">
                    <div class="d-flex flex-wrap mt-3">
                        <a class="btn btn-sm btn-primary mx-2" href="{{route('createProfile')}}">Create Profile</a>
                        <a class="btn btn-sm btn-primary mx-2" href="{{route('showProfiles')}}">View Profiles</a>
                    </div>
                </div>
                <!-- Collapsible User Links -->
                <button class="btn btn-info btn-sm mx-2" type="button" data-toggle="collapse" data-target="#userLinks" aria-expanded="false" aria-controls="userLinks">
                    User Links
                </button>
                <div class="collapse" id="userLinks">
                    <div class="d-flex flex-wrap mt-3">
                        <a class="btn btn-sm btn-primary mx-2" href="{{route('createUser')}}">Create User</a>
                        <a class="btn btn-sm btn-primary mx-2" href="{{route('showUsers')}}">View Users</a>
                    </div>
                </div>
            <a href="{{route('logout')}}" class="btn btn-danger btn-sm mx-2">Logout</a>
            </div>
    </header>
    @if(session()->has('success'))
        <div class='container container--narrow'>
            <div class='alert alert-success text-center'>
                {{session('success')}}
            </div>
        </div>
    @elseif(session()->has('error'))
        <div class='container container--narrow'>
            <div class='alert alert-danger text-center'>
                {{session('error')}}
            </div>
        </div>
    @endif
    {{$slot}}

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