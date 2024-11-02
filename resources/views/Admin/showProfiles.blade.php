<x-aLayout>
    <h1 class="text-center mb-4">View All Profiles</h1>
    
    <div class="container">
        @if($profiles->isEmpty())
            <p>No profiles found.</p>
        @else
            @foreach ($profiles as $profile)
                <div class="card mb-3 shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h2 class="h5 mb-0">{{ optional($profile->owner)->name }} - {{ $profile->business_type }}</h2>
                    </div>
                    <div class="card-body">
                        <p><strong>ID:</strong> {{$profile->id}}</p>
                        <p><a href="{{route('showProfile', $id=$profile->id)}}" class="btn btn-info btn-sm">See all</a></p>
                    </div>
                </div>
            @endforeach
            {{ $profiles->links() }}
        @endif
    </div>
</x-aLayout>