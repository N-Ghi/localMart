<x-aLayout>
    <div class="container d-flex justify-content-center">
        <div class="card mb-4" style="width: 100%; max-width: 600px;">
            <div class="card-header text-center">
                <h5 class="card-title text-primary">{{ $service->name }}</h5>
            </div>
            <div class="card-body">
                <p><strong>Owner:</strong> {{ $service->owned->name }}</p>
                <p><strong>Name:</strong> {{ $service->name }}</p>
                <p><strong>Description:</strong> {{ $service->description }}</p>
                <p><strong>Price:</strong> {{ $service->price}} Rwf</p>
                <p><strong>Start Time:</strong> {{ $service->start_time}}</p>
                <p><strong>Price:</strong> {{ $service->finish_time}}</p>
            </div>
            <div class="card-footer d-flex justify-content-between">
                @can('edit-service')
                    <span>
                        <a href="{{ route('editService', $service->id) }}" class="text-primary mr-2" data-toggle="tooltip" data-placement="top" title="Update Service">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form class="delete-post-form d-inline" action="{{ route('destroyService', $service->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Service?');">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="delete-post-button text-danger" aria-label="Delete Service" data-toggle="tooltip" data-placement="top" title="Delete">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </span>
                @endcan
                <a href="{{ route('showServices') }}" class="btn btn-secondary">Back</a>
                <form action="{{route('createBooking')}}" method="POST">
                    @csrf
                    <input type="hidden" name="service_id" value="{{ $service->id }}">
                    <button type="submit" class="btn btn-primary">Book</button>
                </form>
            </div>
        </div>
    </div>
</x-aLayout>
