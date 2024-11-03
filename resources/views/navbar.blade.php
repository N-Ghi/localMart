<header class="text-center mb-4">
    <div class="d-flex flex-wrap align-items-center justify-content-between my-3 my-md-0"> 
        <div class="d-flex align-items-center">
            <h4 class="my-0 mr-md-auto font-weight-normal">
                @auth
                    @if (auth()->user()->hasRole('admin'))
                        <a href="{{ route('adminDashboard') }}" class="text-white">{{ config('app.name') }}</a>
                        <!-- Collapsible Service Links -->
                        <button class="btn btn-info btn-sm mx-2" type="button" data-toggle="collapse" data-target="#serviceLinks" aria-expanded="false" aria-controls="serviceLinks">
                            Service Links
                        </button>
                        <div class="collapse" id="serviceLinks">
                            <div class="d-flex flex-wrap mt-3">
                                <a class="btn btn-sm btn-primary mx-2" href="{{ route('createService') }}">Create Service</a>
                                <a class="btn btn-sm btn-primary mx-2" href="{{ route('showServices') }}">View Services</a>
                            </div>
                        </div>

                        <!-- Collapsible Booking Links -->
                        <button class="btn btn-info btn-sm mx-2" type="button" data-toggle="collapse" data-target="#BookingLinks" aria-expanded="false" aria-controls="BookingLinks">
                            Booking Links
                        </button>
                        <div class="collapse" id="BookingLinks">
                            <div class="d-flex flex-wrap mt-3">
                                <a class="btn btn-sm btn-primary mx-2" href="{{ route('showBookings') }}">View Bookings</a>
                            </div>
                        </div>

                        <!-- Collapsible Profile Links -->
                        <button class="btn btn-info btn-sm mx-2" type="button" data-toggle="collapse" data-target="#profileLinks" aria-expanded="false" aria-controls="profileLinks">
                            Profile Links
                        </button>
                        <div class="collapse" id="profileLinks">
                            <div class="d-flex flex-wrap mt-3">
                                <a class="btn btn-sm btn-primary mx-2" href="{{ route('createProfile') }}">Create Profile</a>
                                <a class="btn btn-sm btn-primary mx-2" href="{{ route('showProfiles') }}">View Profiles</a>
                            </div>
                        </div>

                        <!-- Collapsible User Links -->
                        <button class="btn btn-info btn-sm mx-2" type="button" data-toggle="collapse" data-target="#userLinks" aria-expanded="false" aria-controls="userLinks">
                            User Links
                        </button>
                        <div class="collapse" id="userLinks">
                            <div class="d-flex flex-wrap mt-3">
                                <a class="btn btn-sm btn-primary mx-2" href="{{ route('createUser') }}">Create User</a>
                                <a class="btn btn-sm btn-primary mx-2" href="{{ route('showUsers') }}">View Users</a>
                            </div>
                        </div>
                    @elseif (auth()->user()->hasRole('provider'))
                        <a href="{{ route('travellerDashboard') }}" class="text-white">{{ config('app.name') }}</a>
                        <!-- Collapsible Service Links -->
                        <button class="btn btn-info btn-sm mx-2" type="button" data-toggle="collapse" data-target="#serviceLinks" aria-expanded="false" aria-controls="serviceLinks">
                            Service Links
                        </button>
                        <div class="collapse" id="serviceLinks">
                            <div class="d-flex flex-wrap mt-3">
                                <a class="btn btn-sm btn-primary mx-2" href="{{ route('createService') }}">Create Service</a>
                                <a class="btn btn-sm btn-primary mx-2" href="{{ route('showServices') }}">View Services</a>
                            </div>
                        </div>

                        <!-- Collapsible Booking Links -->
                        <button class="btn btn-info btn-sm mx-2" type="button" data-toggle="collapse" data-target="#BookingLinks" aria-expanded="false" aria-controls="BookingLinks">
                            Booking Links
                        </button>
                        <div class="collapse" id="BookingLinks">
                            <div class="d-flex flex-wrap mt-3">
                                <a class="btn btn-sm btn-primary mx-2" href="{{ route('showBookings') }}">View Bookings</a>
                            </div>
                        </div>

                        <!-- Collapsible Profile Links -->
                        <button class="btn btn-info btn-sm mx-2" type="button" data-toggle="collapse" data-target="#profileLinks" aria-expanded="false" aria-controls="profileLinks">
                            Profile Links
                        </button>
                        <div class="collapse" id="profileLinks">
                            <div class="d-flex flex-wrap mt-3">
                                <a class="btn btn-sm btn-primary mx-2" href="{{ route('createProfile') }}">Create Profile</a>
                                <a class="btn btn-sm btn-primary mx-2" href="{{ route('showProfiles') }}">View Profiles</a>
                            </div>
                        </div>

                    @elseif (auth()->user()->hasRole('traveller'))
                        <a href="{{ route('providorDashboard') }}" class="text-white">{{ config('app.name') }}</a>

                        <!-- Collapsible Booking Links -->
                        <button class="btn btn-info btn-sm mx-2" type="button" data-toggle="collapse" data-target="#BookingLinks" aria-expanded="false" aria-controls="BookingLinks">
                            Booking Links
                        </button>
                        <div class="collapse" id="BookingLinks">
                            <div class="d-flex flex-wrap mt-3">
                                <a class="btn btn-sm btn-primary mx-2" href="{{ route('showBookings') }}">View Bookings</a>
                            </div>
                        </div>

                        <!-- Collapsible Profile Links -->
                        <button class="btn btn-info btn-sm mx-2" type="button" data-toggle="collapse" data-target="#profileLinks" aria-expanded="false" aria-controls="profileLinks">
                            Profile Links
                        </button>
                        <div class="collapse" id="profileLinks">
                            <div class="d-flex flex-wrap mt-3">
                                <a class="btn btn-sm btn-primary mx-2" href="{{ route('createProfile') }}">Create Profile</a>
                                <a class="btn btn-sm btn-primary mx-2" href="{{ route('showProfiles') }}">View Profiles</a>
                            </div>
                        </div>
                        @else
                        <p>error</p>
                    
                        @endif
                @endauth
            </h4>
            <!-- Logout Button -->
            <a href="{{ route('logout') }}" class="btn btn-danger btn-sm mx-2">Logout</a>
        </div>
    </div>
</header>
