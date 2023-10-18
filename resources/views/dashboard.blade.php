<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>CarsNoting</title>
</head>

<body style="background-color: #f8f8f8;">

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
        <style>
            .custom-card {
                transition: transform .2s, box-shadow .2s;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                border-radius: 20px;
                overflow: hidden;
            }

            .custom-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 7px 9px rgba(0, 0, 0, 0.2);
            }

            .vehicle-image {
                width: 150px;
                height: auto;
                border-radius: 15px;
                margin-right: 15px;
            }

            .btn {
                border-radius: 20px;
                transition: all .2s;
            }

            .btn:hover {
                transform: translateY(-2px);
            }
        </style>

            <div class="card custom-card" style="background-color: #ffffff; color: #000000; margin-bottom: 1rem;">
                <div class="card-body d-flex align-items-center">
                <!-- Vehicle Image -->
                @if($vehicle->images->isNotEmpty())
                    <img src="{{ asset('storage/' . $vehicle->images->first()->image_path) }}"
                         alt="{{ $vehicle->brand }} {{ $vehicle->model }}" class="vehicle-image">
                @else
                    <img src="{{ asset('images/logoCarsNotation.png') }}"
                         alt="{{ $vehicle->brand }} {{ $vehicle->model }}" class="vehicle-image">
                @endif

                <!-- Brand, Model and Rating -->
                <div class="mr-4">
                    <h5 class="card-title">{{ $vehicle->brand }} {{ $vehicle->model }} -
                        Propriétaire: {{ $vehicle->user->pseudo }}</h5>
                    <p><strong>Note:</strong> {{ $vehicle->general_rating }}/10</p>
                </div>

                <!-- Button to Display Details -->
                <button type="button" class="btn btn-primary ml-auto" data-toggle="modal"
                        data-target="#vehicleModal-{{ $vehicle->id }}">Voir les détails
                </button>

                @if(auth()->id() == $vehicle->user_id)
                    <button type="button" class="btn btn-danger ml-2" onclick="confirmDelete({{ $vehicle->id }})">
                        Supprimer
                    </button>
                    <script>
                        function confirmDelete(vehicleId) {
                            Swal.fire({
                                title: 'Êtes-vous sûr?',
                                text: "Vous ne pourrez pas revenir en arrière!",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#d33',
                                cancelButtonColor: '#3085d6',
                                confirmButtonText: 'Oui, supprimez-le!',
                                cancelButtonText: 'Annuler'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    document.querySelector(`#delete-form-${vehicleId}`).submit();
                                }
                            })
                        }
                    </script>
                    <form id="delete-form-{{ $vehicle->id }}" method="POST"
                          action="{{ route('vehicle.destroy', $vehicle->id) }}" style="display: none;">
                        @csrf
                        @method('DELETE')
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

                                        @if(auth()->id() === $comment->user->id)
                                            <div class="d-flex justify-content-start align-items-center">
                                                <!-- Delete Button -->
                                                <form action="{{ route('comments.destroy', $comment->id) }}"
                                                      method="POST" class="mr-2">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Supprimer
                                                    </button>
                                                </form>

                                                <!-- Edit Button -->
                                                <button type="button" class="btn btn-sm btn-warning"
                                                        data-toggle="collapse"
                                                        data-target="#editForm-{{ $comment->id }}">Edit
                                                </button>
                                            </div>

                                            <!-- Update Form - Collapsible, shown when "Edit" is clicked -->
                                            <div class="collapse mt-2" id="editForm-{{ $comment->id }}">
                                                <form action="{{ route('comments.update', $comment->id) }}"
                                                      method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <textarea name="comment"
                                                              class="form-control">{{ $comment->comment }}</textarea>
                                                    <button type="submit" class="btn btn-primary mt-2">Mettre à jour
                                                    </button>
                                                </form>
                                            </div>
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
        </div>
    @endforeach
</div>

<!-- Bootstrap and jQuery Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
