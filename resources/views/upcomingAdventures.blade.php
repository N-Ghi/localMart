<x-aLayout>
    <div class="container">
        <h2 class="text-center my-4">Upcoming Adventures</h2>
        <div class="row">
            @if($adventures->isEmpty())
                <div class="container d-flex justify-content-center align-items-center vh-100">
                    <div class="card text-center w-50">
                        <div class="card-header">
                            <h5>OH NOOO!!!!</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">It seems like you have no ongoing adventures booked.</p>
                            <p class="card-text">But, put a smile on that frown because we can change that, follow the link below to get your advetures started.</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{route('showServices')}}" class="btn btn-info btn-lg">Book Adventure</a>
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
