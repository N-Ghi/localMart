<x-aLayout>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-3">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-2">Upcoming Adventures</div>
                                <div class="h3 mb-0 font-weight-bold text-gray-800">{{ $adventures }}</div>
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
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-2">Past Adventures</div>
                                <div class="h3 mb-0 font-weight-bold text-gray-800">{{ $pastAdventures }}</div>
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
    <hr>

    <h3>Trending Attractions</h3>
    <div class="card-body">
        <div class="row">
            @foreach($services as $service)
                <div class="col-md-6 mb-4"> <!-- Two cards per row on medium and larger screens -->
                    <div class="card h-100 shadow-lg border-0">
                        <div class="card-header text-center">
                            <h5 class="card-title mb-0">{{ $service->service->name }}</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ $service->service->description }}</p>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('showService', $service->service->id) }}" class="btn btn-info btn-sm">See all</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-aLayout>

<style>
    /* Custom card styling */
    .card {
        border-radius: 8px;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        font-weight: 600;
        padding: 1rem;
        /* background-color: #007bff;
        color: #fff; */
    }

    .card-title {
        font-size: 1.2rem;
        margin: 0;
    }

    .card-footer {
        padding: 0.5rem;
    }

    /* Button styling */
    .btn-info {
        background-color: #17a2b8;
        border-color: #17a2b8;
        transition: background-color 0.3s ease;
    }

    .btn-info:hover {
        background-color: #138496;
        border-color: #138496;
    }
</style>
