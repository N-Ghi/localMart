<x-aLayout>
    <h1 class="mb-4">Create Service</h1>
    <form action="{{ route('storeService') }}" method="POST" class="bg-light p-4 rounded shadow">
        @csrf
        
        <div class="form-group mb-3">
            <label for="name" class="form-label">Service Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter Service Name" required aria-describedby="nameError">
            @error('name')
                <div id="nameError" class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Enter Description" required aria-describedby="descriptionError">
            @error('description')
                <div id="descriptionError" class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="Enter Price" required aria-describedby="priceError">
            @error('price')
                <div id="priceError" class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="start_time" class="form-label">Start Time:</label>
            <input type="time" class="form-control @error('start_time') is-invalid @enderror" id="start_time" name="start_time" required aria-describedby="startTimeError">
            @error('start_time')
                <div id="startTimeError" class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="finish_time" class="form-label">End Time:</label>
            <input type="time" class="form-control @error('finish_time') is-invalid @enderror" id="finish_time" name="finish_time" required aria-describedby="finishTimeError">
            @error('finish_time')
                <div id="finishTimeError" class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        @role('admin')
            <div class="form-group mb-4">
                <label for="owner_id" class="form-label">Select Provider:</label>
                <select name="owner_id" id="owner_id" class="form-control @error('owner_id') is-invalid @enderror" required aria-describedby="ownerError">
                    <option value="">Choose a provider</option>
                    @foreach($providers as $provider)
                        <option value="{{ $provider->id }}">{{ $provider->id }}. {{ $provider->name }}</option>
                    @endforeach
                </select>
                @error('owner_id')
                    <div id="ownerError" class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        @endrole

        <button type="submit" class="btn btn-primary btn-block">Submit</button>
    </form>
</x-aLayout>
