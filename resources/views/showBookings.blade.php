<x-aLayout>
    <div class="container">
        <h2 class="text-center my-4">All Adventures</h2>
        <div class="row">
            @if($bookings->isNotEmpty())
                @foreach ($bookings as $booking)
                    <div class="col-md-4 mb-3">
                        <div class="card h-100 shadow">
                            <div class="card-header text-center text-white">
                                <h5 class="card-title 
                                                    {{ $booking->service->end_date > now() ? 'text-success' : 'text-danger' }}">
                                                    {{ $booking->service->name }}
                                                </h5>
                            </div>
                            <div class="card-body">
                                <p><strong>Provider:</strong> {{ $booking->service->owned->name }}</p>
                                <p><strong>Price:</strong> {{ $booking->service->price }} Rwf</p>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <div class="text-center">
                                    <a href="{{ route('showMyBooking', $booking->id) }}" class="btn btn-secondary btn-sm">See All</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-center bg-primary text-white">
                            <h5 class="card-title mb-0">No service booked</h5>
                        </div>
                        <div class="card-body text-center">
                            <p>To see your bookings you need to first make one.</p>
                            <p>Follow the link below to book your first adventure.</p>
                            <a href="{{ route('showServices') }}" class="btn btn-info btn-sm">See Adventures</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-aLayout>
