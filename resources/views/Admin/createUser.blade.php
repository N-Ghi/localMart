<x-aLayout>
    <div class="container container--narrow py-5">
        <h1 class="text-center mb-4">Create A User</h1>
        <form action="{{ route('storeUser') }}" method="POST" class="border p-4 rounded bg-light">
            @csrf
        
            <!-- Display Success Message -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        
            <!-- Name Field -->
            <div class="form-group">
                <label for="name" class="font-weight-bold">Name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Enter name" required aria-required="true">
                @error('name')
                    <small class="text-danger" id="nameError">{{ $message }}</small>
                @enderror
            </div>
        
            <!-- Email Field -->
            <div class="form-group">
                <label for="email" class="font-weight-bold">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Enter email" required aria-required="true">
                @error('email')
                    <small class="text-danger" id="emailError">{{ $message }}</small>
                @enderror
            </div>
        
            <!-- Password Field -->
            <div class="form-group">
                <label for="password" class="font-weight-bold">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Enter password" required aria-required="true">
                @error('password')
                    <small class="text-danger" id="passwordError">{{ $message }}</small>
                @enderror
            </div>
        
            <!-- Role Field (Single Selection) -->
            <div class="form-group">
                <label for="role" class="font-weight-bold">Role</label>
                <select id="role" name="role" class="form-control" required aria-required="true" aria-describedby="roleError">
                    <option value="" disabled selected>Select Role</option>
                    @foreach ($role as $item)
                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                @error('role')
                    <small class="text-danger" id="roleError">{{ $message }}</small>
                @enderror
            </div>
        
            <!-- Submit Button -->
            <div class="text-center">
                <input type="submit" value="Create User" class="btn btn-primary btn-block">
            </div>
        </form>
    </div>
</x-aLayout>
