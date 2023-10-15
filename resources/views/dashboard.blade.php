<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>CarsNoting</title>
</head>

<body class="bg-light"> <!-- Removed the red background -->

<!-- Navigation Bar -->
@include('layouts.navigation')


<!-- Alpine.js -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<div class="container mt-4">
    @if(!auth()->check())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Vous êtes déconnecté.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif

        @foreach ($vehicles as $vehicle)
            <div class="card mb-4">
                <div class="card-body d-flex align-items-center">
                    <!-- Vehicle Image -->
                    <img src="{{ $vehicle->vehicle_images[0] ?? 'default-image-path.jpg' }}" alt="{{ $vehicle->brand }} {{ $vehicle->model }}" class="mr-4" style="width: 100px; height: auto;">

                    <!-- Brand, Model and Rating -->
                    <div class="mr-4">
                        <h5 class="card-title">{{ $vehicle->brand }} {{ $vehicle->model }} - Owned by: {{ $vehicle->user->name }}</h5>
                        <p><strong>Note:</strong> {{ $vehicle->general_rating }}/10</p>
                    </div>

                    <!-- Button to Display Details -->
                    <button type="button" class="btn btn-primary ml-auto" data-toggle="modal" data-target="#vehicleModal-{{ $vehicle->id }}">
                        Voir les détails
                    </button>
                </div>
            </div>

            <!-- Modal for Each Vehicle -->
            <div class="modal fade" id="vehicleModal-{{ $vehicle->id }}" tabindex="-1" role="dialog" aria-labelledby="vehicleModalLabel-{{ $vehicle->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="vehicleModalLabel-{{ $vehicle->id }}">{{ $vehicle->brand }} {{ $vehicle->model }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- All Vehicle Details -->
                            <strong>Year:</strong> {{ $vehicle->year }} <br>
                            <strong>Category:</strong> {{ $vehicle->category }} <br>
                            <strong>Energy:</strong> {{ $vehicle->energy }} <br>
                            <strong>Transmission:</strong> {{ $vehicle->transmission }} <br>
                            <strong>Price:</strong> {{ $vehicle->price }} <br>
                            <strong>Kilometrage:</strong> {{ $vehicle->kilometrage }} <br>
                            <strong>Engine Rating:</strong> {{ $vehicle->engine_rating }}/10 <br>
                            <strong>Chassis Rating:</strong> {{ $vehicle->chassis_rating }}/10 <br>
                            <strong>Visual Rating:</strong> {{ $vehicle->visual_rating }}/10 <br>
                            <strong>Description:</strong> {{ $vehicle->description ?? 'N/A' }} <br>
                            <!-- If you want to display vehicle images in the modal, you can add a section for that as well. -->
                        </div>
                    </div>
                </div>
            </div>
        @endforeach


</div>

<!-- Bootstrap and jQuery Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
