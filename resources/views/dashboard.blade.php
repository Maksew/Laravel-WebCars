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
        <div class="card mb-2">
            <div class="card-body d-flex align-items-center">
                <!-- Vehicle Image -->
                @if($vehicle->images->isNotEmpty())
                    <img src="{{ asset('storage/' . $vehicle->images->first()->image_path) }}"
                         alt="{{ $vehicle->brand }} {{ $vehicle->model }}" class="mr-4"
                         style="width: 100px; height: auto;">
                @else
                    <img src="{{ asset('images/logoCarsNotation.png') }}"
                         alt="{{ $vehicle->brand }} {{ $vehicle->model }}" class="mr-4"
                         style="width: 100px; height: auto;">
                @endif

                <!-- Brand, Model and Rating -->
                <div class="mr-4">
                    <h5 class="card-title">{{ $vehicle->brand }} {{ $vehicle->model }} - Propriétaire
                        : {{ $vehicle->user->pseudo }}</h5>
                    <p><strong>Note:</strong> {{ $vehicle->general_rating }}/10</p>
                </div>

                <!-- Button to Display Details -->

                <button type="button" class="btn btn-primary ml-auto" data-toggle="modal"
                        data-target="#vehicleModal-{{ $vehicle->id }}">
                    Voir les détails
                </button>
                @if(auth()->id() == $vehicle->user_id)
                    <form method="POST" action="/path/to/delete/route/{{ $vehicle->id }}"
                          onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce véhicule?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger ml-2">
                            Supprimer
                        </button>
                    </form>
                @endif
            </div>
        </div>

        <!-- Modal for Each Vehicle -->
        <div class="modal fade" id="vehicleModal-{{ $vehicle->id }}" tabindex="-1" role="dialog"
             aria-labelledby="vehicleModalLabel-{{ $vehicle->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"
                            id="vehicleModalLabel-{{ $vehicle->id }}">{{ $vehicle->brand }} {{ $vehicle->model }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body p-5" style="font-size: 1.1em;"> <!-- Increased font size globally -->
                        <div class="row">
                            <!-- Left column for image and main details -->
                            <div class="col-md-5 mb-4"> <!-- Increased margin-bottom -->
                                @if($vehicle->images->isNotEmpty())
                                    <img src="{{ asset('storage/' . $vehicle->images->first()->image_path) }}"
                                         alt="{{ $vehicle->brand }} {{ $vehicle->model }}"
                                         class="img-fluid mb-4 border rounded shadow">
                                @else
                                    <img src="{{ asset('images/logoCarsNotation.png') }}"
                                         alt="{{ $vehicle->brand }} {{ $vehicle->model }}"
                                         class="img-fluid mb-4 border rounded shadow">
                                @endif
                                <h4 class="text-primary mb-4 font-weight-bold">{{ $vehicle->brand }} {{ $vehicle->model }}</h4>
                                <p class="text-secondary">
                                    <strong>Description:</strong> {{ $vehicle->description ?? 'N/A' }}</p>
                            </div>
                            <!-- Separator -->
                            <div class="col-md-1">
                                <div class="border-right"></div>
                            </div>
                            <div class="col-md-6 pt-4 pb-4">
                                <!-- Added padding-top and padding-bottom to the main div -->
                                <div class="row mb-4">
                                    <div class="col-6 mb-3">
                                        <div class="mb-3"> <!-- Added margin-bottom for each element -->
                                            <strong><i class="fa fa-calendar" aria-hidden="true"></i> Year:</strong>
                                            <span class="ml-2">{{ $vehicle->year }}</span>
                                        </div>
                                        <div class="mb-3">
                                            <strong><i class="fa fa-tags" aria-hidden="true"></i> Category:</strong>
                                            <span class="ml-2">{{ $vehicle->category }}</span>
                                        </div>
                                        <div class="mb-3">
                                            <strong><i class="fa fa-plug" aria-hidden="true"></i> Energy:</strong>
                                            <span class="ml-2">{{ $vehicle->energy }}</span>
                                        </div>
                                        <div class="mb-3">
                                            <strong><i class="fa fa-cogs" aria-hidden="true"></i> Transmission:</strong>
                                            <span class="ml-2">{{ $vehicle->transmission }}</span>
                                        </div>
                                        <div class="mb-3">
                                            <strong><i class="fa fa-dollar-sign" aria-hidden="true"></i> Price:</strong>
                                            <span
                                                class="ml-2 text-success font-weight-bold">{{ $vehicle->price }}</span>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <div class="mb-3">
                                            <strong><i class="fa fa-tachometer-alt" aria-hidden="true"></i> Kilometrage:</strong>
                                            <span class="ml-2">{{ $vehicle->kilometrage }}</span>
                                        </div>
                                        <div class="mb-3">
                                            <strong><i class="fa fa-star" aria-hidden="true"></i> Engine
                                                Rating:</strong>
                                            <span
                                                class="ml-2 badge {{ $vehicle->engine_rating <= 3 ? 'badge-danger' : ($vehicle->engine_rating <= 6 ? 'badge-warning' : 'badge-success') }}">
                    {{ $vehicle->engine_rating }}/10
                </span>
                                        </div>
                                        <div class="mb-3">
                                            <strong><i class="fa fa-car" aria-hidden="true"></i> Chassis
                                                Rating:</strong>
                                            <span
                                                class="ml-2 badge {{ $vehicle->chassis_rating <= 3 ? 'badge-danger' : ($vehicle->chassis_rating <= 6 ? 'badge-warning' : 'badge-success') }}">
                    {{ $vehicle->chassis_rating }}/10
                </span>
                                        </div>
                                        <div class="mb-3">
                                            <strong><i class="fa fa-eye" aria-hidden="true"></i> Visual Rating:</strong>
                                            <span
                                                class="ml-2 badge {{ $vehicle->visual_rating <= 3 ? 'badge-danger' : ($vehicle->visual_rating <= 6 ? 'badge-warning' : 'badge-success') }}">
                    {{ $vehicle->visual_rating }}/10
                </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="comments-section">
                            <!-- Comments List -->
                            @foreach ($vehicle->comments as $comment)
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <strong class="card-title">{{ $comment->user->pseudo }}</strong>
                                        <p class="card-text">{{ $comment->comment }}</p>

                                        <!-- Place the delete button inside the loop -->
                                        @if(auth()->id() === $comment->user->id || auth()->id() === $vehicle->user_id)
                                            <form action="{{ route('comments.destroy', $comment->id) }}" method="POST"
                                                  class="mt-2">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            @endforeach

                            <!-- Comment Form -->
                            @auth
                                <form action="{{ route('comments.store') }}" method="POST" class="mt-4">
                                    @csrf
                                    <input type="hidden" name="vehicle_id" value="{{ $vehicle->id }}">
                                    <div class="mb-3">
                                        <textarea name="comment" class="form-control" placeholder="Votre commentaire..."
                                                  required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Ajouter un commentaire</button>
                                </form>
                            @endauth
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
