<x-aLayout>
    <style>
        /* Layout container styling */
        x-aLayout {
            display: flex;
            flex-direction: column;
            align-items: center;
            font-family: Arial, sans-serif;
        }

        /* Main title styling */
        h2 {
            color: #333;
            font-size: 2em;
            margin: 20px 0;
        }

        /* Card container styling */
        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .card {
            width: calc(50% - 20px); /* Two cards per row with space between */
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            overflow: hidden;
            box-sizing: border-box;
        }

        /* Header styling */
        .card-header {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 15px;
            font-weight: bold;
            font-size: 1.2em;
            border-bottom: 1px solid #ddd;
        }

        /* Body styling */
        .card-body {
            padding: 15px;
            color: #555;
        }
        .card-body p {
            margin: 5px 0;
            font-size: 1em;
        }

        /* Footer styling */
        .card-footer {
            background-color: #f1f1f1;
            padding: 10px 15px;
            text-align: right;
        }

        .card-footer a {
            color: #007BFF;
            text-decoration: none;
            font-weight: bold;
        }

        .card-footer a:hover {
            text-decoration: underline;
        }

        /* Responsive design for small screens */
        @media (max-width: 768px) {
            .card {
                width: 100%; /* Stacks cards on smaller screens */
            }
        }
    </style>

    <h2>Past Adventures</h2>
    <div class="card-container">
        @if($adventures->isEmpty())
            <div class="card">
                <div class="card-header">
                    <p>No past adventures found.</p>
                </div>
            </div>
        @else
            @foreach ($adventures as $adventure)
                <div class="card">
                    <div class="card-header">
                        <p>{{$adventure->service->name}}</p>
                    </div>
                    <div class="card-body">
                        <p>{{$adventure->service->description}}</p>
                        <p>Price: {{$adventure->service->price}}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{route('showMyBooking', $adventure->id)}}">See All</a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</x-aLayout>
