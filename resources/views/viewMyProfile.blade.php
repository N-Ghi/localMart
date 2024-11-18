<x-aLayout>
    @role('provider')
        @foreach ($myProfile as $profile)
            <div class="card mb-3 shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h2 class="h5 mb-0">{{ $profile->owner->name }} - {{ $profile->business_type }}</h2>
                </div>
                <div class="card-body">
                    <p><strong>ID:</strong> {{$profile->id}}</p>
                    <p><a href="{{route('showProfile', $id=$profile->id)}}" class="btn btn-info btn-sm">See all</a></p>
                </div>
            </div>
        @endforeach
    @endrole
</x-aLayout>


