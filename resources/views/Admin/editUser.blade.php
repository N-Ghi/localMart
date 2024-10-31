<x-aLayout>
    <div class="container container--narrow py-5">
        <h1 class="text-center mb-4">Create A User</h1>
        <form action="{{ route('updateUser') }}" method="POST" class="border p-4 rounded bg-light">
            @method('put')
            @csrf
            <div class="form-group">
                <label for="name" class="font-weight-bold">Name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Enter name" required>
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="email" class="font-weight-bold">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Enter email" required>
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="password" class="font-weight-bold">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Enter password" required>
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="role" class="font-weight-bold">Role</label>
                <select id="role" name="roles[]" class="form-control">
                    <option value="">Select Role</option>
                    @foreach ($role as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                @error('roles')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="text-center">
                <input type="submit" value="Create User" class="btn btn-primary btn-block">
            </div>
        </form>
    </div>
</x-aLayout>
