<x-aLayout>
    <h1 class="text-center mb-4">View Bookings</h1>
    <div class="container d-flex justify-content-center">
        <div class="card mb-4 shadow" style="width: 100%; max-width: 600px;">
            @foreach ($bookings as $booking)
                <div class="card-header text-center bg-primary text-white">
                    <h5 class="card-title mb-0">{{ $booking->service->name }}</h5>
                </div>
                <div class="card-body">
                    <p><strong>Service:</strong> {{ $booking->service->name }}</p>
                    <p><strong>Provider:</strong> {{ $booking->service->owned->name }}</p>
                    <p><strong>Price:</strong> {{ $booking->service->price }} Rwf</p>
                    <p><strong>Status:</strong> {{ $booking->status }}</p>
                    <p><strong>Start Time:</strong> {{ \Carbon\Carbon::parse($booking->service->start_time)->format('h:i A') }}</p>
                    <p><strong>Finish Time:</strong> {{ \Carbon\Carbon::parse($booking->service->finish_time)->format('h:i A') }}</p>
                    <p><strong>Booked At:</strong> {{ \Carbon\Carbon::parse($booking->created_at)->format('d M Y, h:i A') }}</p>
                </div>

                <div class="card-footer d-flex justify-content-between">
                    @can('create-payment')
                        @if ($booking->status == 'pending')
                            <form  action="{{ route('createPayment') }}" method="POST">
                                @csrf
                                <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                                <button type="submit" class="btn btn-info">Pay</button>
                            </form>
                        @endif
                    @endcan
                    <a href="{{ route('showBookings') }}" class="btn btn-secondary">Back</a>
                    <form class="delete-post-form d-inline" action="{{ route('destroyBooking', $booking->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this booking?');">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</x-aLayout>
