<x-aLayout>
    @role('provider')
        <div class="container">
            <h2 class="text-center my-4">View My Profiles</h2>
            <div class="row">
                @foreach ($myProfile as $profile)
                    <div class="col-md-6 mb-4"> <!-- 2 per row -->
                        <div class="card h-100 shadow-sm">
                            <div class="card-header">
                                <h2 class="h5 mb-0">{{$profile->id}} - {{ $profile->owner->name }} </h2>
                            </div>
                            <div class="card-body">
                                <p><strong>Business Type:</strong> {{ $profile->business_type }}</p>
                                <p><strong>Location:</strong> {{ $profile->location }}</p>
                            </div>
                            <div class="card-footer text-center">
                                <a href="{{route('showProfile', $id=$profile->id)}}" class="btn btn-info btn-sm">See all</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endrole
</x-aLayout>
