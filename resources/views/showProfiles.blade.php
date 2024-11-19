<x-aLayout>
    <div class="container">
        <h2 class="text-center my-4">View All Profiles</h2>
        
        @if($profiles->isEmpty())
            <p>No profiles found.</p>
        @else
            @role('admin')
                <div class="row">
                    @foreach ($profiles as $profile)
                        <div class="col-md-6 mb-4"> 
                            <div class="card h-100 shadow-sm">
                                <div class="card-header">
                                    <h2 class="h5 mb-0">{{ optional($profile->owner)->name }} - {{ $profile->business_type }}</h2>
                                </div>
                                <div class="card-body">
                                    <p><strong>ID:</strong> {{$profile->id}}</p>
                                </div>
                                <div class="card-footer text-center">
                                    <a href="{{route('showProfile', $id=$profile->id)}}" class="btn btn-info btn-sm">See all</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{ $profiles->links() }}
            @endrole
        @endif
    </div>
</x-aLayout>
