<x-aLayout>
    <div class="container container--narrow py-5">
        <h1 class="text-center mb-4">Update A User</h1>
        <form action="{{ route('updateUser', $user->id) }}" method="POST" class="border p-4 rounded bg-light">
            @method('put')
            @csrf
            <div class="form-group">
                <label for="name" class="font-weight-bold">Name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Enter name" value="{{ old('name', $user->name) }}" required>
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="email" class="font-weight-bold">Email</label>
                <input type="email" id="email" value="{{ old('email', $user->email) }}" name="email" class="form-control" placeholder="Enter email" required>
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="password" class="font-weight-bold">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Enter new password (optional)">
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="role" class="font-weight-bold">Role</label>
                <select id="role" name="role" class="form-control" required aria-required="true" aria-describedby="roleError">
                    <option value="" disabled>Select Role</option>
                    @foreach ($role as $item)
                        <option value="{{ $item->name }}" {{ $user->roles->first()->name === $item->name ? 'selected' : '' }}>
                            {{ $item->name }}
                        </option>
                    @endforeach
                </select>
                @error('role')
                    <small class="text-danger" id="roleError">{{ $message }}</small>
                @enderror
            </div>
            <div class="text-center">
                <input type="submit" value="Update User" class="btn btn-primary btn-block">
            </div>
        </form>
    </div>
</x-aLayout>
