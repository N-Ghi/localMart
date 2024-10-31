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
    
    <footer class="border-top text-center small text-muted py-3 mt-4">
        <p class="m-0">&copy; {{date('Y')}} <a href="/" class="text-muted">{{config('app.name')}}</a>. All rights reserved.</p>
    </footer> 
</x-aLayout>
