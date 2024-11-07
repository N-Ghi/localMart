<x-aLayout>
    <div class="container">
        <div class="row">
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
            <div class="col-lg-6 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-3">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-2">Total Bookings</div>
                                <div class="h3 mb-0 font-weight-bold text-gray-800">{{ $totalBookings }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-book fa-3x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Top Services Section -->
        <div class="container">
            <h2>Top Three Most Popular Services</h2>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Service Name</th>
                        <th>Times Booked</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($popularServices as $item)
                        <tr>
                            <td>{{ $item->service->name ?? 'Unknown Service' }}</td>
                            <td>{{ $item->occurrences }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2">You have no bookings for your services.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Recent Bookings Section -->
        <div class="container">
            <h2>Recent Bookings</h2>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Service Name</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($recentBookings as $booking)
                        <tr>
                            <td>{{ $booking->service->name ?? 'Unknown Service' }}</td>
                            <td>{{ $booking->created_at->format('d M Y') }}</td>
                            <td>{{ ucfirst($booking->status) }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">No recent bookings available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <style>
        /* Dashboard title styling */
        h1 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #333;
            text-align: center;
            margin-bottom: 2rem;
        }

        /* Section headings */
        h2 {
            font-size: 1.75rem;
            color: #555;
            font-weight: 600;
            margin-top: 1.5rem;
        }0
        
        /* Icon color */
        .text-gray-300 {
            color: #b0b0b0 !important;
        }

        /* Table styling */
        .table thead th {
            background-color: #f8f9fc;
            color: #333;
            font-weight: 600;
        }

        .table tbody tr {
            transition: background-color 0.3s ease;
        }

        .table tbody tr:hover {
            background-color: #f1f1f1;
        }

    </style>
</x-aLayout>
