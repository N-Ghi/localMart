<x-aLayout>
    <div class="container">
        <h2 class="text-center my-4">Upcoming Adventures</h2>
        <div class="row">
            @if($adventures->isEmpty())
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <p>No upcoming adventures found.</p>
                        </div>
                    </div>
                </div>
            @else
                @foreach ($adventures as $adventure)
                    <div class="col-md-6 mb-3"> <!-- This ensures 2 cards per row -->
                        <div class="card h-100">
                            <div class="card-header">
                                <h5 class="card-title">{{ $adventure->service->name }}</h5>
                            </div>
                            <div class="card-body">
                                <p class="card-text">{{ $adventure->service->description }}</p>
                                <p class="card-text"><strong>Price:</strong> ${{ number_format($adventure->service->price, 2) }}</p>
                            </div>
                            <div class="card-footer">
                                <p><a href="{{route('showMyBooking', $adventure->id)}}" class="btn btn-info btn-sm">See All</a></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</x-aLayout>
