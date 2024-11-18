<x-aLayout>
    <style>
        body {
            font-family: 'Source Sans Pro', sans-serif;
            background-color: #f8f9fa;
        }
        .card {
            background: linear-gradient(135deg, #e0eaff, #f8f9fa);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            overflow: hidden;
        }
        .card-header {
            background-color: #007bff;
            color: #fff;
            text-align: center;
            font-size: 1.25rem;
            padding: 1rem;
            font-weight: 700;
        }
        .card-body {
            padding: 1.5rem;
        }
        .card-text {
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
        }
        .social-links ul {
            list-style: none;
            padding: 0;
        }
        .social-links ul li {
            display: inline-block;
            margin-right: 10px;
        }
    </style>
    <div class="container">
        <div class="card mx-auto mt-5 mb-5" style="max-width: 500px;">
            <div class="card-header">
                {{ optional($profile->owner)->name }} - {{ $profile->business_type }}
            </div>
            <div class="card-body">
                <p class="card-text"><strong>ID:</strong> {{$profile->id}}</p>
                <p class="card-text"><strong>Business Type:</strong> {{$profile->business_type}}</p>
                <p class="card-text"><strong>Business Name:</strong> {{$profile->owner->name}}</p>
                <p class="card-text"><strong>Business Hours:</strong> {{$profile->business_hours_open}} - {{$profile->business_hours_close}}</p>
                <p class="card-text"><strong>Business Address:</strong> {{$profile->location}}</p>
                <p class="card-text"><strong>Business Number:</strong> {{$profile->phone_number}}</p>
                <p class="card-text"><strong>Business Email:</strong> {{$profile->owner->email}}</p>
                <p class="card-text"><strong>Business Description:</strong> {{$profile->about}}</p>
                <p class="card-text"><strong>Momo Code:</strong> {{$profile->payment_info}}</p>
                
                <div class="social-links">
                    <p class="card-text"><strong>Business Socials:</strong></p>
                    <ul>
                        <li>{!! $output !!}</li>
                    </ul>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between">
                @can('edit-service')
                    <span>
                        <a href="{{ route('editProfile', $profile->id) }}" class="text-primary mr-2" data-toggle="tooltip" data-placement="top" title="Update User">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form class="delete-post-form d-inline" action="{{ route('destroyProfile', $profile->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Profile?');">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="delete-post-button text-danger" aria-label="Delete Profile" data-toggle="tooltip" data-placement="top" title="Delete">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </span>
                @endcan
                @role('admin')
                    <span>
                        <a href="{{ route('showProfiles') }}" class="btn btn-secondary">Back</a>
                    </span>
                @endrole
                @role('provider')
                    <span>
                        <a href="{{ route('showMyProfiles') }}" class="btn btn-secondary">Back</a>
                    </span>
                @endrole
            </div>
        </div>

    </div>
</x-aLayout>