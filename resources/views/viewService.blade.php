<x-aLayout>
    <div class="container d-flex justify-content-center my-5">
        <div class="card mb-4 shadow-sm" style="width: 100%; max-width: 600px; border-radius: 12px;">
            <div class="card-header text-center bg-light">
                <h5 class="card-title text-primary font-weight-bold" style="font-size: 1.25rem;">{{ $service->name }}</h5>
            </div>
            <div class="card-body p-4">
                <p><strong>Owner:</strong> {{ $service->owned->name }}</p>
                <p><strong>Name:</strong> {{ $service->name }}</p>
                <p><strong>Description:</strong> {{ $service->description }}</p>
                <p><strong>Price:</strong> {{ $service->price }} Rwf</p>
                <p><strong>Time:</strong> {{ \Carbon\Carbon::parse($service->start_time)->format('h:i A') }} - {{ \Carbon\Carbon::parse($service->finish_time)->format('h:i A') }}</p>
                <p><strong>Date:</strong> {{ \Carbon\carbon::parse($service->start_date)->format('d M Y')}} - {{\Carbon\carbon::parse($service->end_date)->format('d M Y')}} </p>

                @can('create-service')
                    <p><strong>Created At:</strong> {{ \Carbon\Carbon::parse($service->created_at)->format('d M Y, h:i A') }}</p>
                @endcan
            </div>
            <div class="card-footer d-flex justify-content-between align-items-center bg-light p-3">
                @can('edit-service')
                    <span>
                        <a href="{{ route('editService', $service->id) }}" class="text-primary mr-2" data-toggle="tooltip" data-placement="top" title="Update Service">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form class="delete-post-form d-inline" action="{{ route('destroyService', $service->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Service?');">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="delete-post-button text-danger border-0 bg-transparent" aria-label="Delete Service" data-toggle="tooltip" data-placement="top" title="Delete">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </span>
                @endcan

                <a href="{{ route('showServices') }}" class="btn btn-outline-secondary btn-sm">Back</a>
                
                @can('create-booking')
                    <form action="{{route('createBooking')}}" method="POST">
                        @csrf
                        <input type="hidden" name="service_id" value="{{ $service->id }}">
                        <button type="submit" class="btn btn-primary btn-sm">Book</button>
                    </form>
                @endcan
            </div>
        </div>
    </div>
</x-aLayout>
