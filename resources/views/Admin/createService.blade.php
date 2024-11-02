<x-aLayout>
    <h1 class="mb-4">Create Service</h1>
    <form action="{{ route('storeService') }}" method="POST" class="bg-light p-4 rounded shadow">
        @csrf
        
        <div class="form-group mb-3">
            <label for="name" class="form-label">Service Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Service Name" required>
            @error('name')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description" placeholder="Enter Description" required>
            @error('description')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control" id="price" name="price" placeholder="Enter Price" required>
            @error('price')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="start_time" class="form-label">Start Time:</label>
            <input type="time" class="form-control" id="start_time" name="start_time" required>
            @error('start_time')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="finish_time" class="form-label">End Time:</label>
            <input type="time" class="form-control" id="finish_time" name="finish_time" required>
            @error('finish_time')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-4">
            <label for="owner_id" class="form-label">Select Provider:</label>
            <select name="owner_id" id="owner_id" class="form-control" required>
                <option value="">Choose a provider</option>
                @foreach($providers as $provider)
                    <option value="{{ $provider->id }}">{{ $provider->id }}. {{ $provider->name }}</option>
                @endforeach
            </select>
            @error('owner_id')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary btn-block">Submit</button>
    </form>
</x-aLayout>
