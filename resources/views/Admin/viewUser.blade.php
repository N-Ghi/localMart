<x-aLayout>
    <div class="container d-flex justify-content-center">
        <div class="card mb-4" style="width: 100%; max-width: 600px;">
            <div class="card-header text-center">
                <h5 class="card-title text-primary">{{ $user->name }}</h5>
            </div>
            <div class="card-body">
                <p><strong>ID:</strong> {{ $user->id }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Role:</strong> {{ $user->getRoleNames()->first() }}</p>
                <p><strong>Created At:</strong> {{ $user->created_at->format('Y-m-d H:i') }}</p>
                <p><strong>Updated At:</strong> {{ $user->updated_at->format('Y-m-d H:i') }}</p>
            </div>
            <div class="card-footer d-flex justify-content-between">
                @can('edit-user')
                    <span>
                        <a href="{{ route('editUser', $user->id) }}" class="text-primary mr-2" data-toggle="tooltip" data-placement="top" title="Update User">
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
                <a href="{{ route('showUsers') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
</x-aLayout>
