<x-aLayout>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary">{{$user->name}}</h2>
        @can(['edit-user'])
            <span class="pt-2">
                <a href="{{route('editUser', $user->id)}}" class="text-primary mr-2" data-toggle="tooltip" data-placement="top" title="Update User">
                    <i class="fas fa-edit"></i>
                </a>
                <form class="delete-post-form d-inline" action="{{ route('destroyUser', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this User?');">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="delete-post-button text-danger" aria-label="Delete User" data-toggle="tooltip" data-placement="top" title="Delete">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </span>
        @endcan
    </div>
    
    <p><strong>ID:</strong> {{$user->id}}</p>
    <p><strong>Role:</strong> {{$user->getRoleNames()->first()}}</p> 

    
    <a href="{{route('showUsers')}}">Back</a>
</x-aLayout>