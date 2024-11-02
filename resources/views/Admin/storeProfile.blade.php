<x-aLayout>
    <div class="container mt-5">
        <h2>Create Business Profile</h2>
        <form action="{{route('storeProfile')}}" method="POST">
            @csrf

            <div class="form-group">
                <label for="business_type">Type of Business:</label>
                <input type="text" class="form-control" id="business_type" name="business_type" required>
            </div>

            <div class="form-group">
                <label for="location">Location (Address):</label>
                <input type="text" class="form-control" id="location" name="location" required>
            </div>

            <div class="form-group">
                <label for="phone_number">Phone Number:</label>
                <input type="tel" class="form-control" id="phone_number" name="phone_number" required>
            </div>

            <div class="form-group">
                <label for="payment_info">Momo Code:</label>
                <input type="text" class="form-control" id="payment_info" name="payment_info" required>
            </div>

            <div class="form-group">
                <label for="business_hours_open">Business Hours (Open):</label>
                <input type="time" class="form-control" id="business_hours_open" name="business_hours_open" required>
            </div>

            <div class="form-group">
                <label for="business_hours_close">Business Hours (Close):</label>
                <input type="time" class="form-control" id="business_hours_close" name="business_hours_close" required>
            </div>

            <div class="form-group">
                <label for="about">About the Business:</label>
                <textarea class="form-control" id="about" name="about" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label for="social_media">Social Media Links (JSON format):</label>
                <textarea class="form-control" id="social_media" name="social_media" rows="2" required placeholder='{"facebook": "link", "instagram": "link"}'></textarea>
            </div>
            <div class="form-group">
                <label for="owner_id">Select Provider:</label>
                <select name="owner_id" id="owner_id" class="form-control" required>
                    <option value="">Choose a provider</option>
                    @foreach($providers as $provider)
                        <option value="{{ $provider->id }}">{{ $provider->id }}.{{ $provider->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</x-aLayout>