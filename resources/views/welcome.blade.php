<x-layout>
    <h1 class="text-center my-4">Local Experience Marketplace</h1>
    <p class="text-center text-muted mb-5">The Local Experience Marketplace, or Local Mart, is an online platform that connects tourists to local communities in Rwanda.</p>
    
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-4">
                <h2>About Us</h2>
                <p>Welcome to the Local Experience Marketplace! We are dedicated to connecting tourists with local communities in Rwanda, providing unique and authentic experiences. Explore our diverse range of activities and immerse yourself in the rich culture and traditions of this beautiful country.</p>
            </div>
            <div class="col-md-6 mb-4">
                <h2>How It Works</h2>
                <p>Discovering and booking experiences on our platform is simple. Just browse through our listings, select the experience that interests you, and make a reservation. Our local hosts are passionate about sharing their knowledge and expertise, ensuring you have an unforgettable time during your visit to Rwanda.</p>
            </div>
            <div class="col-md-6">
                <h2>How to Proceed</h2>
                <p>Select the role you’d like to take on to begin your local experience journey. Are you the traveler seeking a deeper connection to our country, or the local provider eager to showcase the unique experiences of Rwanda?</p>

                <a href="{{route('registerTraveller')}}" class="btn btn-primary btn-sm mr-2" data-toggle="tooltip" title="Explore as a Traveller">Traveller</a>

                <a href="{{route('registerProvider')}}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Provide experiences as a Local Provider">Provider</a>
            </div>
        </div>
    </div>
</x-layout>
