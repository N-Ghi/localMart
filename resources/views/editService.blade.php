<x-aLayout>
    <h1 class="mb-4">Edit Service</h1>
    <form action="{{ route('updateService', $service->id) }}" method="POST" class="bg-light p-4 rounded shadow">
        @method('PUT')
        @csrf
        
        <div class="form-group mb-3">
            <label for="name" class="form-label">Service Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $service->name) }}" placeholder="Enter Service Name" required>
            @error('name')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description" placeholder="Enter Description" value="{{ old('description', $service->description) }}" required>
            @error('description')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control" id="price" name="price" placeholder="Enter Price" value="{{ old('price', $service->price) }}" required>
            @error('price')
                <div class="alert alert-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="start_time" class="form-label">Start Time:</label>
            <input type="time" class="form-control" id="start_time" name="start_time" value="{{ old('start_time', $service->start_time) }}" required>
            @error('start_time')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="finish_time" class="form-label">End Time:</label>
            <input type="time" class="form-control" id="finish_time" name="finish_time" value="{{ old('finish_time', $service->finish_time) }}" required>
            @error('finish_time')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label class="form-label" for="start-date">Start Date</label>
            <input type="date" class="form-control" name="start_date" id="start-date" required>
        </div>
        
        <div class="form-group mb-3">
            <label class="form-label" for="end-date">End Date</label>
            <input type="date" class="form-control" name="end_date" id="end-date" required>
        </div>

        @role('admin')
            <div class="form-group mb-4">
                <label for="owner_id" class="form-label">Select Provider:</label>
                <select name="owner_id" id="owner_id" class="form-control" required aria-describedby="ownerError">
                    <option value="">Choose a provider</option>
                    @foreach($providers as $provider)
                        <option value="{{ $provider->id }}" {{ old('owner_id', $service->owner_id) == $provider->id ? 'selected' : '' }}>
                            {{ $provider->id }}. {{ $provider->name }}
                        </option>
                    @endforeach
                </select>
                @error('owner_id')
                    <div id="ownerError" class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
        @endrole

        <button type="submit" class="btn btn-primary btn-block">Submit</button>
    </form>

    <script>
        const startDateInput = document.getElementById('start-date');
        const endDateInput = document.getElementById('end-date');
    
        startDateInput.addEventListener('change', () => {
            endDateInput.min = startDateInput.value; // Set min end date to selected start date
        });
    </script>
</x-aLayout>