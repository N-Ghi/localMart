<x-aLayout>
    <div class="container">
        <h2 class="text-center my-4">View All Services</h2>
        @role('admin')
            <div class="card-body">
                <div class="row">
                    @if (!empty($services))
                        @foreach($services as $service)
                            <div class="col-md-4 mb-3"> <!-- Adjust column width as needed -->
                                <div class="card h-100">
                                    <div class="card-header">
                                        <h5 class="card-title 
                                            {{ $service->end_date > now() ? 'text-success' : 'text-danger' }}">
                                            {{ $service->name }}
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">{{ $service->description }}</p>
                                        <p class="card-text"><strong>Price:</strong> ${{ number_format($service->price, 2) }}</p>
                                    </div>
                                    <div class="card-footer">
                                        <p><a href="{{route('showService', $service->id)}}" class="btn btn-info btn-sm">See all</a></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="container d-flex justify-content-center align-items-center vh-100">
                            <div class="card text-center w-50">
                                <div class="card-header">
                                    <h5 class="card-title">No Services Found</h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">First create a service.</p>
                                    <p class="card-text">Follow the link below to get started.</p>
                                </div>
                                <div class="card-footer">
                                    <a href="{{route('createService')}}" class="btn btn-info btn-lg">Create Service</a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        @endrole
        @role('provider')
            <div class="card-body">
                <div class="row">
                    @if (!empty($services))
                        @foreach($services as $service)
                            <div class="col-md-4 mb-3"> <!-- Adjust column width as needed -->
                                <div class="card h-100">
                                    <div class="card-header">
                                        <h5 class="card-title 
                                            {{ $service->end_date > now() ? 'text-success' : 'text-danger' }}">
                                            {{ $service->name }}
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">{{ $service->description }}</p>
                                        <p class="card-text"><strong>Price:</strong> ${{ number_format($service->price, 2) }}</p>
                                    </div>
                                    <div class="card-footer">
                                        <p><a href="{{route('showService', $service->id)}}" class="btn btn-info btn-sm">See all</a></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="container d-flex justify-content-center align-items-center vh-100">
                            <div class="card text-center w-50">
                                <div class="card-header">
                                    <h5 class="card-title">No Services Found</h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">First create a service.</p>
                                    <p class="card-text">Follow the link below to get started.</p>
                                </div>
                                <div class="card-footer">
                                    <a href="{{route('createService')}}" class="btn btn-info btn-lg">Create Service</a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        @endrole
        @role('traveller')
            <div class="card-body">
                <div class="row">
                    @if (!empty($services))
                        @foreach($services as $service)
                            <div class="col-md-4 mb-3"> <!-- Adjust column width as needed -->
                                <div class="card h-100">
                                    <div class="card-header">
                                        <h5 class="card-title 
                                            {{ $service->end_date > now() ? 'text-success' : 'text-danger' }}">
                                            {{ $service->name }}
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">{{ $service->description }}</p>
                                        <p class="card-text"><strong>Price:</strong> ${{ number_format($service->price, 2) }}</p>
                                    </div>
                                    <div class="card-footer">
                                        <p><a href="{{route('showService', $service->id)}}" class="btn btn-info btn-sm">See all</a></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="container d-flex justify-content-center align-items-center vh-100">
                            <div class="card text-center w-50">
                                <div class="card-header">
                                    <h5 class="card-title">No Adventure Found</h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">First book an adventure.</p>
                                    <p class="card-text">Follow the link below to get started.</p>
                                </div>
                                <div class="card-footer">
                                    <a href="{{route('showServices')}}" class="btn btn-info btn-lg">Book Adventure</a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        @endrole
    </div>
</x-aLayout>
