<x-aLayout>
    <h1 class="text-center mb-4">All Adventures</h1>
    <div class="container d-flex justify-content-center">
        <div class="card mb-4 shadow" style="width: 100%; max-width: 600px;">
            @if($bookings->isNotEmpty())
                @foreach ($bookings as $booking)
                    <div class="card-header text-center bg-primary text-white">
                        <h5 class="card-title mb-0">{{ $booking->service->name }}</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>Provider:</strong> {{ $booking->service->owned->name }}</p>
                        <p><strong>Price:</strong> {{ $booking->service->price }} Rwf</p>
                    </div>

                    <div class="card-footer d-flex justify-content-between">
                        <div class="text-center">
                            <a href="{{ route('showMyBooking', $booking->id) }}" class="btn btn-secondary">See All</a>
                        </div>
                    </div>
                @endforeach
                
            @else
                <div class="card-header text-center bg-primary text-white">
                    <h5 class="card-title mb-0">No service booked</h5>
                </div>
                <div class="card-body">
                    <p class="text-center">To see your bookings you need to first make one.</p>
                    <p class="text-center">Follow the link below to book your first adventure.</p>
                    <div class="text-center">
                        <a href="{{ route('showServices') }}" class="btn btn-info btn-sm">See Adventures</a>
                    </div>               
                </div>
            @endif
            
        </div>
    </div>
</x-aLayout>
