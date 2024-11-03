<x-aLayout>
    <div class="container-fluid p-4">
        <h1 class="display-4 text-center mb-4">Admin Dashboard</h1>

        <div class="row">
            <div class="col-lg-6 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-3">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-2">Total Users</div>
                                <div class="h3 mb-0 font-weight-bold text-gray-800">{{ $totalUsers }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-3x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-3">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-2">Active Providers</div>
                                <div class="h3 mb-0 font-weight-bold text-gray-800">{{ $activeGuides }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-tie fa-3x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-3">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-2">Total Bookings</div>
                                <div class="h3 mb-0 font-weight-bold text-gray-800">{{ $totalTours }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clock fa-3x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-3">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-2">Total Paid bookings</div>
                                <div class="h3 mb-0 font-weight-bold text-gray-800">{{ $paidBookings }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-check fa-3x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-3">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-2">Total Unpaid Bookings</div>
                                <div class="h3 mb-0 font-weight-bold text-gray-800">{{ $unpaidBookings }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-times fa-4x text-gray-300" aria-label="Unpaid Bookings" title="Unpaid Bookings"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-3">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-2">Total Services</div>
                                <div class="h3 mb-0 font-weight-bold text-gray-800">{{ $totalServices }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-3x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-aLayout>
