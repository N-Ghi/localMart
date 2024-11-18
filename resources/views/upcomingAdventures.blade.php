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
        .adventure-cards {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 20px;
            width: 80%;
            max-width: 1200px;
        }

        /* Card styling */
        .card {
            width: 48%; /* This allows two cards per row */
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            overflow: hidden;
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
    </style>

    <h2>Upcoming Adventures</h2>
    <div class="adventure-cards">
        @if($adventures->isEmpty())
            <div class="card">
                <div class="card-header">
                    <p>No upcoming adventures found.</p>
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
