<x-aLayout>
    <div class="container mt-5">
        <h2>Update Business Profile</h2>
        <form action="{{ route('updateProfile', $profile->id) }}" method="POST">
            @method('put')
            @csrf

            <div class="form-group">
                <label for="business_type">Type of Business:</label>
                <input type="text" class="form-control" id="business_type" name="business_type" value="{{ old('business_type', $profile->business_type) }}" required>
                @error('business_type')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="location">Location (Address):</label>
                <input type="text" class="form-control" id="location" name="location" value="{{ old('location', $profile->location) }}" required>
                @error('location')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="phone_number">Phone Number:</label>
                <input type="tel" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number', $profile->phone_number) }}" required>
                @error('phone_number')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="payment_info">Momo Code:</label>
                <input type="text" class="form-control" id="payment_info" name="payment_info" value="{{ old('payment_info', $profile->payment_info) }}" required>
                @error('payment_info')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="business_hours_open">Business Hours (Open):</label>
                <input type="time" class="form-control" id="business_hours_open" name="business_hours_open" value="{{ old('business_hours_open', $profile->business_hours_open) }}" required>
                @error('business_hours_open')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="business_hours_close">Business Hours (Close):</label>
                <input type="time" class="form-control" id="business_hours_close" name="business_hours_close" value="{{ old('business_hours_close', $profile->business_hours_close) }}" required>
                @error('business_hours_close')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="about">About the Business:</label>
                <textarea class="form-control" id="about" name="about" rows="4" required>{{ old('about', $profile->about) }}</textarea>
                @error('about')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="social_media">Social Media Links ("{"Social media name":"Link"}"):</label>
                <textarea class="form-control" id="social_media" name="social_media" rows="2" required placeholder='{"facebook": "link", "instagram": "link"}'>{{ old('social_media', $profile->social_media) }}</textarea>
                @error('social_media')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            @role('admin')
                <div class="form-group">
                    <label for="owner_id">Select Provider:</label>
                    <select name="owner_id" id="owner_id" class="form-control" required>
                        <option value="">Choose a provider</option>
                        @foreach($providers as $provider)
                            <option value="{{ $provider->id }}" {{ old('owner_id', $profile->owner_id) == $provider->id ? 'selected' : '' }}>
                                {{ $provider->id }}.{{ $provider->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('owner_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            @endrole

            @if(auth()->user()->hasRole('provider'))
                <input type="hidden" name="owner_id" value="{{ auth()->user()->id }}">
            @endif

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</x-aLayout>
