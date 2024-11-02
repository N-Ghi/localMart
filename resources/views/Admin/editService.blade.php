<x-aLayout>
    <h1>Edit Service</h1>
    <form action="{{route('updateService', $service->id)}}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="name">Service Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $service->name) }}" placeholder="Enter Service Name">

            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" name="description" placeholder="Enter Description" value="{{ old('description', $service->description) }}">

            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" class="form-control" id="price" name="price" placeholder="Enter Price" value="{{ old('price', $service->price) }}">

            @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="business_hours_open">Start Time:</label>
            <input type="time" class="form-control" id="start_time" name="start_time" value="{{ old('start_time', $service->start_time) }}" required>
            @error('start_time')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="business_hours_close">End Time:</label>
            <input type="time" class="form-control" id="finish_time" name="finish_time" value="{{ old('finish_time', $service->finish_time) }}" required>
            @error('finish_time')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="owner_id">Select Provider:</label>
            <select name="owner_id" id="owner_id" class="form-control" required aria-describedby="ownerError">
                <option value="">Choose a provider</option>
                @foreach($providers as $provider)
                    <option value="{{ $provider->id }}" {{ old('owner_id', $service->owner_id) == $provider->id ? 'selected' : '' }}>{{ $provider->id }}.{{ $provider->name }}</option>
                @endforeach
            </select>
            @error('owner_id')
                <div id="ownerError" class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</x-aLayout>