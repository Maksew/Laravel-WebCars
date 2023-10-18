@component('mail::message')
    # Nouveau véhicule ajouté

    Bonjour, {{ $vehicle->user->name }}!

    Vous avez ajouté un nouveau véhicule avec succès : {{ $vehicle->brand }} {{ $vehicle->model }} ({{ $vehicle->year }}).

    Merci de faire confiance à notre plateforme!

    L'équipe de CarsNoting
@endcomponent
