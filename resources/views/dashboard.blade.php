<!DOCTYPE html>
<html lang="en" class="h-full bg-red-500">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Votre titre ici</title>
</head>
<body class="h-full bg-red-500 flex flex-col">

<x-app-layout class="flex-1">
    @if(!auth()->check())
        <div id="notification" class="bg-red-500 text-white px-4 py-2 mb-4 relative z-50">

        Vous êtes déconnecté.
            <button onclick="closeNotification()" class="absolute top-1 right-4 text-white hover:text-red-800">
                ×
            </button>
        </div>
    @endif

    @foreach ($vehicles as $vehicle)
        <div>
            <h2>{{ $vehicle->brand }} {{ $vehicle->model }}</h2>
            <!-- ... autres détails du véhicule ... -->
        </div>
    @endforeach
</x-app-layout>

<script>
    function closeNotification() {
        document.getElementById('notification').style.display = 'none';
    }
</script>

</body>
</html>
