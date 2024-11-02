<x-aLayout>
    <h1 class="text-center mb-4">View All Users</h1>
    
    <div class="container">
        @foreach ($users as $user)
            <div class="card mb-3 shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h2 class="h5 mb-0">{{$user->name}}</h2>
                </div>
                <div class="card-body">
                    <p><strong>ID:</strong> {{$user->id}}</p>
                    <p><strong>Role:</strong> {{$user->getRoleNames()->first()}}</p>
                    <p><a href="{{route('showUser', $id=$user->id)}}" class="btn btn-info btn-sm">See all</a></p>
                </div>
            </div>
        @endforeach
    </div>
</x-aLayout>
