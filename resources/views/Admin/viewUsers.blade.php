<x-aLayout>
    <h2 class="text-center my-4">View All Users</h2>
    
    <div class="container">
        <div class="row">
            @foreach ($users as $user)
                <div class="col-md-6 mb-4"> <!-- 2 per row -->
                    <div class="card h-100 shadow-sm">
                        <div class="card-header">
                            <h2 class="h5 mb-0">{{$user->name}}</h2>
                        </div>
                        <div class="card-body">
                            <p><strong>ID:</strong> {{$user->id}}</p>
                            <p><strong>Role:</strong> {{$user->getRoleNames()->first()}}</p>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{route('showUser', $id=$user->id)}}" class="btn btn-info btn-sm">See all</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-aLayout>
